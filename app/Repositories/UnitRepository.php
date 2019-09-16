<?php

namespace App\Repositories;

use App\Models\Unit as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UnitRepository
 *
 * @package App\Repositories
 */
class UnitRepository extends CoreRepository
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
