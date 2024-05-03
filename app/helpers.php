<?php 

use App\Models\Menu;
use App\Models\Page;
use App\Models\MenuPageRelation;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;

if(!function_exists('obtenerConfiguraciones')) {
    function obtenerConfiguraciones()
    {
        $configs = ['title_site','description_site'];
        $config = [];
        foreach($configs as $key) {
            $item = Configuration::where('key','=',$key)->pluck('value')->first();

            $config[$key] = $item;
        }
    
        return $config;
    }
}