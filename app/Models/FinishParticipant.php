<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishParticipant extends Model
{
    use HasFactory;

    protected $primaryKey = ['userid', 'distanceid'];
    const CREATED_AT = 'creationdate';
    const UPDATED_AT = 'updatedate';
}
