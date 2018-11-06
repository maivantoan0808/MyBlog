<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'MVT.Admin',
            'username' => 'admin',
            'email' => 'admin@myblog.com',
            'image' => 'mvtadmin-2018-08-27-5b83c6c45904c.png',
            'about' => 'Mobile Full Stack Developer',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'MVT.Author',
            'username' => 'author',
            'email' => 'author@myblog.com',
            'image' => 'mvtauthor-2018-08-28-5b85228d29141.jpg',
            'about' => 'Web Full Stack Developer',
            'password' => bcrypt('author123'),
        ]);
    }
}
