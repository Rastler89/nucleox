<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public function menus() {
        return $this->belgonsToMany(Menu::class, 'menu_page_relations', 'page_id', 'menu_id');
    }
}
