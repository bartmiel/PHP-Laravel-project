<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    use HasFactory;

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    protected $primaryKey = 'distanceid';
    const CREATED_AT = 'creationdate';
    const UPDATED_AT = 'updatedate';

    protected $fillable = [
        'competitionid',
        'name',
        'distancelimit',
    ];
}
