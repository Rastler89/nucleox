<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sin categoria'
            ],
            [
                'name' => 'Promoción'
            ]
        ];

        DB::table('categories')->insert($categories);

        $pages = [
            [
                'identifier' => 'home',
                'title' => 'Home',
                'category_id' => 1,
                'status' => 1
            ],
            [
                'identifier' => 'promotion',
                'title' => 'Promotion',
                'category_id' => 2,
                'status' => 1
            ]
        ];

        DB::table('pages')->insert($pages);

        $menu_position = [
            [
                'name' => 'ncx_header',
                'is_active' => 1
            ], 
            [
                'name' => 'ncx_footer',
                'is_active' => 1
            ]
        ];

        DB::table('menu_position')->insert($menu_position);

        $menus = [
            [
                'name' => 'Main menu',
                'is_active' => true,
                'order' => 1,
                'position_id' => 1
            ], 
            [
                'name' => 'Footer menu',
                'is_active' => true,
                'order' => 1,
                'position_id' => 2
            ]
        ];

        DB::table('menus')->insert($menus);

        $menu_page_relations = [
            [
                'menu_id' => 1,
                'page_id' => 1,
                'order' => 1,
                'is_active' => 1
            ],
            [
                'menu_id' => 1,
                'page_id' => 2,
                'order' => 2,
                'is_active' => 1
            ]
        ];

        DB::table('menu_page_relations')->insert($menu_page_relations);
    }
}
