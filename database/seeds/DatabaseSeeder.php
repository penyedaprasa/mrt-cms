<?php

use Illuminate\Database\Seeder;
use App\SidebarMenu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $menu = SidebarMenu::insert([
          ['title'=>'Train',
          'tooltip'=>'Master Train',
          'url'=>'#',
          'route'=>'',
          'icon'=>'fa fa-train',
          'parent'=>0,
          'enabled'=>'Y',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')],
          ['title'=>'Station',
          'tooltip'=>'Master Station',
          'url'=>'#',
          'route'=>'',
          'icon'=>'fa fa-charging-station',
          'parent'=>0,
          'enabled'=>'Y',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')],
          ['title'=>'Route',
          'tooltip'=>'Master Route',
          'url'=>'#',
          'route'=>'',
          'icon'=>'fa fa-road',
          'parent'=>0,
          'enabled'=>'Y',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')],
          ['title'=>'Train Route',
          'tooltip'=>'Train Route',
          'url'=>'#',
          'route'=>'',
          'icon'=>'fa fa-tram',
          'parent'=>0,
          'enabled'=>'Y',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')],
        ]);
    }
}
