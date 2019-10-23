<?php

namespace App\Repositories;

use App\Models\Equipment as Model;
use Carbon\Carbon;

/**
 * Class EquipmentRepository
 *
 * @package App\Repositories
 */
class EquipmentRepository extends CoreRepository
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
            'equipment_name_id',
            'quantity',
            'power',
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

    public function getTreashedEquipment($id)
    {
        $result = $this->startConditions()
            ->withTrashed()
            ->where('id', $id)
            ->first();

        return $result;
    }
}
