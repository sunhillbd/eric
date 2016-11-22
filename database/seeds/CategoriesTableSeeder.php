<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    private $categories = [
        'press',
        'leading_role',
        'major_significance',
        'critical_role',
        'high_compensation',
        'major_commercial_success'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        (new \App\FormCategory())->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($this->categories as $key =>  $category) {
            DB::table('form_categories')->insert([

                'name' => $category,

            ]);



        }

        for($i=1;$i<7;$i++){

            DB::table('form_category_user')->insert([

                'form_category_id' => $i,
                'user_id' => 1,
                'status' => 'In Progress',

            ]);
        }


    }
}
