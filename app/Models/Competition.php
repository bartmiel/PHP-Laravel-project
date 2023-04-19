<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    public function distance()
    {
        return $this->hasMany(Distance::class, 'competitionid');
    }

    protected $primaryKey = 'competitionid';
    const CREATED_AT = 'creationdate';
    const UPDATED_AT = 'updatedate';

    protected $attributes = [
        'isregistrationactive' => 1,
        'isfinished' => 0,
        'isactive' => 1,
    ];

    protected $fillable = [
        'name',
        'location',
        'description',
        'date',
        'time',
    ];
}
