<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    protected function casts(){
        return [
            'name' => 'string'
        ];
    }

    public function task():HasMany {
        return $this->hasMany(Task::class);
    }
}
