<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    public const MIME_TYPE = [
        'PDF' => 'pdf'
    ];

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'mime_type',
        'google_drive_url',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
