<?php

use Illuminate\Database\Seeder;

class CategoryQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category_questionnare')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $questionnares = new \App\Questionnare();

        foreach($questionnares->all() as $questionnare){

            $questionnare->categories()->attach(1,['is_active'=>1]);
        };



    }
}
