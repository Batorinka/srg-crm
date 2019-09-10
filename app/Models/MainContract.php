<?php

namespace App\Models;

use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\VarDumper\Cloner\Data;

/**
 * Class MainContractType
 *
 * @package App\Models
 *
 * @property MainContractType   $main_contract_type_id
 * @property User               $user_id
 * @property string             $slug
 * @property string             $company_full_name
 * @property string             $company_sub_name
 * @property string             $number
 * @property Date               $signing_date
 * @property Date               $start_date
 * @property Date               $end_date
 * @property string             $contractor_position
 * @property string             $contractor_name
 * @property string             $contractor_cause
 * @property string             $requisites
 * @property string             $supply_contract
 */
class MainContract extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'main_contract_type_id',
            'user_id',
            'slug',
            'company_full_name',
            'company_sub_name',
            'number',
            'signing_date',
            'start_date',
            'end_date',
            'contractor_position',
            'contractor_name',
            'contractor_cause',
            'requisites',
            'supply_contract',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mainContractType()
    {
        return $this->belongsTo(MainContractType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
