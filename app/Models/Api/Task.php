<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'status',
        'due_date'
    ];

    protected function casts()
    {
        return [
            'due_date' => 'date'
        ];
    }

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
