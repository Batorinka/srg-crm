<?php

namespace App\Repositories;

use App\Models\MainContractType as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class MainContractRepository
 *
 * @package App\Repositories
 */
class MainContractTypeRepository extends CoreRepository
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
