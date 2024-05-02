<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;



    public function pages() {
        return $this->belongsToMany(Page::class, 'menu_page_relations', 'menu_id', 'page_id')
            ->wherePivot('is_active', 1)
            ->orderBy('order');
    }

    public function submenus() {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function position() {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
