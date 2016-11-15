<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    private $categories = ['Press','Leading Role','Major Significance','Critical Role','High Compensation','Major Commercial Success'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        (new \App\Category())->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($this->categories as $category) {
            DB::table('categories')->insert([

                'category_name' => $category,

            ]);
        }


    }
}
