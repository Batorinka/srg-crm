<?php

namespace App\Models;

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
slug
company_full_name
company_sub_name
number
signing_date
start_date
end_date
contractor_position
contractor_name
contractor_cause
requisites
supply_contract
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
