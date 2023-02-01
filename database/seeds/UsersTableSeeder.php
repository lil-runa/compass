<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

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
            'over_name' => '田中',
            'under_name' => '太郎',
            'over_name_kana' => 'タナカ',
            'under_name_kana' => 'タロウ',
            'mail_address' => 'tanaka0101@mail.com',
            'sex' => '1',
            'birth_day' => '19900101',
            'role' => '1',
            'password' => bcrypt('tanaka0101'),
        ]);

        DB::table('users')->insert([
            'over_name' => '山田',
            'under_name' => '太郎',
            'over_name_kana' => 'ヤマダ',
            'under_name_kana' => 'タロウ',
            'mail_address' => 'yamada0101@mail.com',
            'sex' => '1',
            'birth_day' => '20000101',
            'role' => '4',
            'password' => bcrypt('yamada0101'),
        ]);

    }
}
