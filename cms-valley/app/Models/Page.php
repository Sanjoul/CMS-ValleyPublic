<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'pages';
    protected $fillable = [
        'pagenames',
        'title',
        'section_id'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class, 'page_id');
    }
}
