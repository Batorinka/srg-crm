<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Limit extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable =
        [
            'gsobject_id',
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
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gsobject()
    {
        return $this->belongsTo(Gsobject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
