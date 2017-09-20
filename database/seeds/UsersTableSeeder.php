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
        DB::table('users')->insert([
    			['name' => 'Yadu Nandan','email'=>'ynandan55@gmail.com','password'=>'$2y$10$vEQvfFws9wzRZtu.GnUx.O/G6gcoqz2AzOWDhuRlEGdbsrYQpGpP6','remember_token'=>'ndKPYxHdOSy7cANvHFMe0ZjwrTvEci00RcHPw5upb96vxBs2iMqLhhwfHUIc','role' => 'Admin','status' => 'Active', 'image' => ""],
    			
    	]);
    }
}
