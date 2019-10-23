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
        return $this->startConditions()
            ->where('slug', $slug)
            ->first();
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

    public function getTreashedMainContract($slug)
    {
        $result = $this->startConditions()
            ->withTrashed()
            ->where('slug', $slug)
            ->first();

        return $result;
    }
}
