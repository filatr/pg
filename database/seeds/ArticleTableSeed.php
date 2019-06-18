<?php
use Illuminate\Database\Seeder;
/**
 * Created by PhpStorm.
 * User: SkillUP_Student
 * Date: 30.05.2019
 * Time: 19:34
 */



class ArticleTableSeed extends Seeder {

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'author' => 'admin@admin.com',
            'description' => 'admin',
        ]);
    }

}