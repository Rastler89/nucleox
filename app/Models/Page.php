<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'title',
        'category_id',
        'status'
    ];

    public function menus() {
        return $this->belongsToMany(Menu::class, 'menu_page_relations');
    }
}
