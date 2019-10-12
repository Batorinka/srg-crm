<?php

namespace App\Repositories;

use App\Models\SetupValue as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class SetupValueRepository
 *
 * @package App\Repositories
 */
class SetupValueRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getIndex()
    {
        return $this->startConditions()
            ->first();
    }

    public function getEdit($id)
    {
        return $this->startConditions()
            ->where('id', $id)
            ->first();
    }
//
//
//    public function getTreashedLimit($id)
//    {
//        $result = $this->startConditions()
//            ->withTrashed()
//            ->where('id', $id)
//            ->first();
//
//        return $result;
//    }
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
//            'company_sub_name',
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
