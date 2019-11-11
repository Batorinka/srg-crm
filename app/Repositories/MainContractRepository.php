<?php

namespace App\Repositories;

use App\Models\MainContract as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class MainContractRepository
 *
 * @package App\Repositories
 */
class MainContractRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'slug',
            'company_sub_name',
            'user_id'
        ];
        $result = $this->startConditions()
            ->select($columns)
            ->where('user_id', \Auth::user()->id)
            ->orderBy('id')
            ->with([
                'mainContractType:id,title',
                'user:id,name'
            ])
            ->paginate(10);
        return $result;
    }

    public function getOneById($id)
    {
        return $this->startConditions()
            ->where('id', $id)
            ->first();
    }

    /**
     * @return
     */
    public function getAllById($id)
    {
        $columns = [
            'slug',
            'company_sub_name',
            'company_full_name',
            'number',
            'signing_date',
            'main_contract_type_id',
            'contractor_position',
            'contractor_name',
            'contractor_cause',
            'requisites',
            'is_industry',
            'is_heat_generating',
            'contract_clause_7_6'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('id', $id)
            ->with([
                'mainContractType:id,title'
            ])
            ->first();

        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getShow($slug)
    {
        $result = $this->startConditions()
            ->where('slug', $slug)
            ->first();
        $result = $this->beautify_is_industry($result);
        $result = $this->beautify_is_heat_generating($result);
        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getEdit($slug)
    {
        return $this->startConditions()
            ->where('slug', $slug)
            ->first();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getForComboBox()
    {
        $columns = [
            'id',
            'company_sub_name',
        ];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }

    public function getTreashedMainContract($slug)
    {
        $result = $this->startConditions()
            ->withTrashed()
            ->where('slug', $slug)
            ->first();

        return $result;
    }

    public function beautify_is_industry($contract)
    {
        $contract['is_industry'] = ($contract['is_industry']) ? 'Промышленность' : 'Комбыт';
        return $contract;
    }

    public function beautify_is_heat_generating($contract)
    {
        $contract['is_heat_generating'] = ($contract['is_heat_generating']) ? 'Да' : 'Нет';
        return $contract;
    }
}
