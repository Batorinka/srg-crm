<?php

namespace App\Repositories;

use App\Models\EquipmentName as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class EquipmentNameRepository
 *
 * @package App\Repositories
 */
class EquipmentNameRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Model::class;
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
            'title',
        ];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }
    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
        ];
        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('title')
            ->paginate(10);
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

    public function getTreashedEquipmeneName($id)
    {
        $result = $this->startConditions()
            ->withTrashed()
            ->where('id', $id)
            ->first();

        return $result;
    }
}
