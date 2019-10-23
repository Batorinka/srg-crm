<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'equipments';

    /**
     * @var array
     */
    protected $fillable =
        [
            'gsobject_id',
            'equipment_name_id',
            'quantity',
            'power',
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
    public function equipmentName()
    {
        return $this->belongsTo(EquipmentName::class);
    }
}
