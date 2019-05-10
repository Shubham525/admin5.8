<?php

namespace App\plugin\query;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'status', 'message', 'deleted_at'];
}
