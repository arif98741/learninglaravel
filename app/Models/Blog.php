<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title', 'description', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
