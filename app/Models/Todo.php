<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'name', 'priority', 'location', 'timestart', 'completed'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $attributes = [
        'completed' => 'false',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
