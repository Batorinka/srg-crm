<?php

namespace App\Repositories;

use App\Models\DeviceName as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class DeviceNameRepository
 *
 * @package App\Repositories
 */
class DeviceNameRepository extends CoreRepository
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
            'device_type_id',
            'title',
        ];
        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('device_type_id')
            ->with([
                'deviceType:id,title',
            ])
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

    public function getTreashedDeviceName($id)
    {
        $result = $this->startConditions()
            ->withTrashed()
            ->where('id', $id)
            ->first();

        return $result;
    }
}
