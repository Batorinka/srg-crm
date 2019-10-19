<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeviceName extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable =
        [
            'device_type_id',
            'title',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class);
    }
}
