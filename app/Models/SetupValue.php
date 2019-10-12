<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetupValue extends Model
{
    protected $fillable =
        [
            'zero_group',
            'first_group',
            'second_group',
            'third_group',
            'fourth_group',
            'fifth_group',
            'sixth_group',
            'special_increase',
        ];
}
