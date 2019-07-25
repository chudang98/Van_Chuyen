<?php

use Illuminate\Database\Seeder;

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
        DB::table('users')->insert(
            [
                ['id' => 1, 'name' => 'Duck', 'email' =>'duck@gmail.com', 'password' => md5('1234'), 'user_type' => 'Khách hàng', 'birth' => '1998-10-03', 'address' => 'Hà Nội', 'communes_id' => '00001',],
                ['id' => 2, 'name' => 'Thảo', 'email' =>'thao@gmail.com','password' => md5('1234'), 'user_type' => 'Quản trị viên','birth' => '1998-10-03','address' => 'Hà Nội','communes_id' => '00001',],
                ['id' => 3, 'name' => 'Linh', 'email' =>'linh@gmail.com', 'password' => md5('1234'), 'user_type' => 'Nhân viên vận chuyển', 'birth' => '1998-10-03', 'address' => 'Hà Nội', 'communes_id' => '00001',]
            ]
        );
    }
}
