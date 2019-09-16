<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Date;

/**
 * Class Gsobject
 *
 * @package App\Models
 *
 * @property MainContract     $main_contract_id
 * @property TO_contract      $TO_contract_id
 * @property PressureUnit     $pressure_unit_id
 * @property string           $slug
 * @property string           $name
 * @property string           $address
 * @property string           $srg
 * @property string           $member_position
 * @property string           $member_name
 * @property Date             $stamp_act_date
 */
class Gsobject extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable =
        [
            'main_contract_id',
            'TO_contract_id',
            'pressure_unit_id',
            'slug',
            'name',
            'address',
            'grs',
            'member_position',
            'member_name',
            'stamp_act_date',
        ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mainContract()
    {
        return $this->belongsTo(MainContract::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function toContract()
    {
        return $this->belongsTo(TO_contract::class, 'TO_contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stampActs()
    {
        return $this->hasMany(StampAct::class);
    }
}
