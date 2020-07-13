<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('Users')->insert(
        //     [
        //         'name' => 'Lê Trọng Nghĩa',
        //         'email' => 'trongnghia1998tn@gmail.com',
        //         'password' => bcrypt('ltnghia123'),
        //         'quyen'=> 1,
        //         'created_at' => new DateTime(),
        //     ]
        // );
        // DB::table('Users')->insert(
        //     [
        //         'name' => 'Đặng Thị Nguyệt',
        //         'email' => 'dtnguyet@gmail.com',
        //         'password' => bcrypt('12345678'),
        //         'quyen'=> 0,
        //         'created_at' => new DateTime(),
        //     ]
        // );

        DB::table('Users')->insert(
            [
                'name' => 'Jacky',
                'email' => 'jacky@gmail.com',
                'password' => bcrypt('12345678'),
                'quyen'=> 0,
                'created_at' => new DateTime(),
            ]
        );
        
        DB::table('Users')->insert(
            [
                'name' => 'Hà Duy Đại',
                'email' => 'haduydai@gmail.com',
                'password' => bcrypt('12345678'),
                'quyen'=> 0,
                'created_at' => new DateTime(),
            ]
        );
    }
}
