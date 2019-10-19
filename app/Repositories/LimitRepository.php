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

        $limits = $this->startConditions()
            ->select($columns)
            ->where('gsobject_id', $gsobjectId)
            ->orderBy('year')
            ->get();

        $results = $this->addTotalСalculation($limits);

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

    public function addTotalСalculation($limits)
    {
        foreach ($limits as $limit) {
            $limit['quarterI_4']   = sprintf('%01.3F', ((float)$limit->jan_4 + (float)$limit->feb_4 + (float)$limit->mar_4));
            $limit['quarterII_4']  = sprintf('%01.3F', ((float)$limit->apr_4 + (float)$limit->may_4 + (float)$limit->jun_4));
            $limit['quarterIII_4'] = sprintf('%01.3F', ((float)$limit->jul_4 + (float)$limit->aug_4 + (float)$limit->sep_4));
            $limit['quarterIV_4']  = sprintf('%01.3F', ((float)$limit->oct_4 + (float)$limit->nov_4 + (float)$limit->dec_4));
            $limit['total_4']      = sprintf('%01.3F', ($limit['quarterI_4'] + $limit['quarterII_4'] + $limit['quarterIII_4'] + $limit['quarterIV_4']));
            $limit['quarterI_8']   = sprintf('%01.3F', ((float)$limit->jan_8 + (float)$limit->feb_8 + (float)$limit->mar_8));
            $limit['quarterII_8']  = sprintf('%01.3F', ((float)$limit->apr_8 + (float)$limit->may_8 + (float)$limit->jun_8));
            $limit['quarterIII_8'] = sprintf('%01.3F', ((float)$limit->jul_8 + (float)$limit->aug_8 + (float)$limit->sep_8));
            $limit['quarterIV_8']  = sprintf('%01.3F', ((float)$limit->oct_8 + (float)$limit->nov_8 + (float)$limit->dec_8));
            $limit['total_8']      = sprintf('%01.3F', ($limit['quarterI_8'] + $limit['quarterII_8'] + $limit['quarterIII_8'] + $limit['quarterIV_8']));
            $limit['quarterI_10']   = sprintf('%01.3F', ((float)$limit->jan_10 + (float)$limit->feb_10 + (float)$limit->mar_10));
            $limit['quarterII_10']  = sprintf('%01.3F', ((float)$limit->apr_10 + (float)$limit->may_10 + (float)$limit->jun_10));
            $limit['quarterIII_10'] = sprintf('%01.3F', ((float)$limit->jul_10 + (float)$limit->aug_10 + (float)$limit->sep_10));
            $limit['quarterIV_10']  = sprintf('%01.3F', ((float)$limit->oct_10 + (float)$limit->nov_10 + (float)$limit->dec_10));
            $limit['total_10']      = sprintf('%01.3F', ($limit['quarterI_10'] + $limit['quarterII_10'] + $limit['quarterIII_10'] + $limit['quarterIV_10']));
            $limit['total_grand']   = sprintf('%01.3F', ($limit['total_4'] + $limit['total_8'] + $limit['total_10']));
        }
        return $limits;
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
