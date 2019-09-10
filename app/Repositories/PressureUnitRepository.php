<?php

namespace App\Repositories;

use App\Models\PressureUnit as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class PressureUnitRepository
 *
 * @package App\Repositories
 */
class PressureUnitRepository extends CoreRepository
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
