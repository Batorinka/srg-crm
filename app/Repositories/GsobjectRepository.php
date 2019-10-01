<?php

namespace App\Repositories;

use App\Models\Gsobject as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class MainContractRepository
 *
 * @package App\Repositories
 */
class GsobjectRepository extends CoreRepository
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
            'name',
            'main_contract_id',
        ];
        $result = $this->startConditions()
            ->select($columns)
//            ->where('user_id', \Auth::user()->id)
            ->with([
                'mainContract:id,company_sub_name',
            ])
            ->orderBy('id')
            ->paginate(10);

        return $result;
    }

    /**
     * @return
     */
    public function getAllById($id)
    {
        $columns = [
            'slug',
            'name',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('main_contract_id', $id)
            ->get();
        return $result;
    }

    /**
     * @return
     */
    public function getOneById($id)
    {
        return $this->startConditions()
            ->where('id', $id)
            ->first();
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
//
//    /**
//     * @param $id2
//     *
//     * @return mixed
//     */
//    public function getForComboBox()
//    {
//        $columns = [
//            'id',
//            'name',
//        ];
//        $result = $this
//            ->startConditions()
//            ->select($columns)
//            ->toBase()
//            ->get();
//
//        return $result;
//    }
}
