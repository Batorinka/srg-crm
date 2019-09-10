<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TO_contract extends Model
{
    public function mainContract()
    {
        return $this->belongsTo(MainContract::class);
    }
}
