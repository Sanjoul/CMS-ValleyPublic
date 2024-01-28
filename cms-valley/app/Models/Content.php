<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'contents';

    protected $fillable = [
        'name ',
        'type',
        'section_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'section_id');
    }

    public function medias()
    {
        return $this->belongsToMany(
            Media::class,    // Related model
            'content_media', // Pivot table
            'content_id',    // Foreign key on the pivot table for the current model
            'media_id'       // Foreign key on the pivot table for the related model
        );
    }
}
