<?php

namespace App\Repositories;

use App\Models\DeviceType as Model;

/**
 * Class DeviceTypeRepository
 *
 * @package App\Repositories
 */
class DeviceTypeRepository extends CoreRepository
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
}
