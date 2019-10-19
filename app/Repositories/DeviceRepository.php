<?php

namespace App\Repositories;

use App\Models\Device as Model;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class DeviceRepository
 *
 * @package App\Repositories
 */
class DeviceRepository extends CoreRepository
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
            'device_name_id',
            'number',
            'last_muster_date',
            'muster_interval',
            'range',
        ];

        $devices = $this->startConditions()
            ->select($columns)
            ->where('gsobject_id', $gsobjectId)
            ->get();

        $result = $this->addNextMusterDate($devices);

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

    public function getTreashedDevice($id)
    {
        $result = $this->startConditions()
            ->withTrashed()
            ->where('id', $id)
            ->first();

        return $result;
    }

    public function addNextMusterDate($devices)
    {
        foreach ($devices as $device) {
            $next_muster_date = Carbon::parse($device->last_muster_date)->addYears((integer) $device->muster_interval);
            $device['next_muster_date'] = Carbon::parse($next_muster_date)->format('d.m.Y');
            $device['last_muster_date'] = Carbon::parse($device['last_muster_date'])->format('d.m.Y');
        }
        return $devices;
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
