<?php

namespace App\Repositories;

use App\Models\StampAct as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class MainContractRepository
 *
 * @package App\Repositories
 */
class StampActRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return
     */
    public function getAllByGSObjectId($gsobjectId)
    {
        $columns = [
            'id',
            'place',
            'number',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('gsobject_id', $gsobjectId)
            ->get();
        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->startConditions()
            ->where('id', $id)
            ->first();
    }

    public function getTreashedStampAct($id)
    {
        $result = $this->startConditions()
            ->withTrashed()
            ->where('id', $id)
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
