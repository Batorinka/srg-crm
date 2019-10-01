<?php

namespace App\Repositories;

use App\Models\Group as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class GroupRepository
 *
 * @package App\Repositories
 */
class GroupRepository extends CoreRepository
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
