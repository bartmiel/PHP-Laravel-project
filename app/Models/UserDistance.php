<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDistance extends Model
{
    use HasFactory;
    const CREATED_AT = 'creationdate';
    const UPDATED_AT = 'updatedate';

    protected $fillable = [
        'userid',
        'distanceid'
    ];
}
