<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    protected $appends = ['parent_name'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function parentName(): Attribute
    {
        return Attribute::make(function () {
            return !is_null($this->category) ? $this->category->name : null;
        });
    }

    public function questions()
    {
        return $this->hasMany(Document::class);
    }
}
