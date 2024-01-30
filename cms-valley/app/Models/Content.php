<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'contents';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name ',
        'type',
        'section_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function medias()
    {
        return $this->belongsToMany(
            Media::class,
            'content_media',
            'content_id',
            'media_id'
        );
    }
}
