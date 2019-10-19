<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable =
        [
            'gsobject_id',
            'device_name_id',
            'number',
            'last_muster_date',
            'muster_interval',
            'range',
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
    public function deviceName()
    {
        return $this->belongsTo(DeviceName::class);
    }
}
