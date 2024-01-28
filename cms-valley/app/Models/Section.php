<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    protected $table = 'sections';
    protected $fillable = [
        'name',
        'page_id',
        'content_id'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function contents()
    {
        return $this->hasMany(Content::class, 'section_id', 'section_id');
    }
}
