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
        $menu = SidebarMenu::create([
          'title'=>'Train',
          'tooltip'=>'Master Train',
          'url'=>'#',
          'route'=>'',
          'icon'=>'',
          'parent'=>0,
          'enabled'=>'Y',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
