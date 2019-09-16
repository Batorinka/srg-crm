<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StampAct extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable =
        [
            'gsobject_id',
            'place',
            'number',
        ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gsobject()
    {
        return $this->belongsTo(Gsobject::class);
    }
}
