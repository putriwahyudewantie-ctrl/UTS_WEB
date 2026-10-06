<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'publisher',
        'year',
        'stock',
    ];

    /**
     * Relationship: Book belongsTo Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
