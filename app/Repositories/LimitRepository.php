<?php

namespace App\Repositories;

use App\Models\Limit as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class LimitRepository
 *
 * @package App\Repositories
 */
class LimitRepository extends CoreRepository
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
            'group_id',
            'year',
            'supplier',
            'jan_4',
            'feb_4',
            'mar_4',
            'apr_4',
            'may_4',
            'jun_4',
            'jul_4',
            'aug_4',
            'sep_4',
            'oct_4',
            'nov_4',
            'dec_4',
            'jan_8',
            'feb_8',
            'mar_8',
            'apr_8',
            'may_8',
            'jun_8',
            'jul_8',
            'aug_8',
            'sep_8',
            'oct_8',
            'nov_8',
            'dec_8',
            'jan_10',
            'feb_10',
            'mar_10',
            'apr_10',
            'may_10',
            'jun_10',
            'jul_10',
            'aug_10',
            'sep_10',
            'oct_10',
            'nov_10',
            'dec_10',
        ];

        $results = $this->startConditions()
            ->select($columns)
            ->where('gsobject_id', $gsobjectId)
            ->orderBy('year')
            ->get();

        foreach ($results as $result) {
            $result['quarterI_4']   = sprintf('%01.3F', ((float)$result->jan_4 + (float)$result->feb_4 + (float)$result->mar_4));
            $result['quarterII_4']  = sprintf('%01.3F', ((float)$result->apr_4 + (float)$result->may_4 + (float)$result->jun_4));
            $result['quarterIII_4'] = sprintf('%01.3F', ((float)$result->jul_4 + (float)$result->aug_4 + (float)$result->sep_4));
            $result['quarterIV_4']  = sprintf('%01.3F', ((float)$result->oct_4 + (float)$result->nov_4 + (float)$result->dec_4));
            $result['total_4']      = sprintf('%01.3F', ($result['quarterI_4'] + $result['quarterII_4'] + $result['quarterIII_4'] + $result['quarterIV_4']));
            $result['quarterI_8']   = sprintf('%01.3F', ((float)$result->jan_8 + (float)$result->feb_8 + (float)$result->mar_8));
            $result['quarterII_8']  = sprintf('%01.3F', ((float)$result->apr_8 + (float)$result->may_8 + (float)$result->jun_8));
            $result['quarterIII_8'] = sprintf('%01.3F', ((float)$result->jul_8 + (float)$result->aug_8 + (float)$result->sep_8));
            $result['quarterIV_8']  = sprintf('%01.3F', ((float)$result->oct_8 + (float)$result->nov_8 + (float)$result->dec_8));
            $result['total_8']      = sprintf('%01.3F', ($result['quarterI_8'] + $result['quarterII_8'] + $result['quarterIII_8'] + $result['quarterIV_8']));
            $result['quarterI_10']   = sprintf('%01.3F', ((float)$result->jan_10 + (float)$result->feb_10 + (float)$result->mar_10));
            $result['quarterII_10']  = sprintf('%01.3F', ((float)$result->apr_10 + (float)$result->may_10 + (float)$result->jun_10));
            $result['quarterIII_10'] = sprintf('%01.3F', ((float)$result->jul_10 + (float)$result->aug_10 + (float)$result->sep_10));
            $result['quarterIV_10']  = sprintf('%01.3F', ((float)$result->oct_10 + (float)$result->nov_10 + (float)$result->dec_10));
            $result['total_10']      = sprintf('%01.3F', ($result['quarterI_10'] + $result['quarterII_10'] + $result['quarterIII_10'] + $result['quarterIV_10']));
        }
        return $results;
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


    public function getTreashedLimit($id)
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
