<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'medias';
    protected $fillable = [
        'name',
        'path',
        'type'
    ];

    public function contents()
    {
        return $this->belongsToMany(
            Content::class,  // Related model
            'content_media', // Pivot table
            'media_id',      // Foreign key on the pivot table for the current model
            'content_id'     // Foreign key on the pivot table for the related model
        );
    }
}
