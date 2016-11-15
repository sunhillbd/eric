<?php

use Illuminate\Database\Seeder;

class QuestionnaresTableSeeder extends Seeder
{


    private $questionnares = [
        'What is the title of this article?',
        'What is the name of the publication in which this article appeared?',
        'When was this article published?',
        'What is the name of the article\'s author?',
        'Is this article in English?',
        'Is this document in English?'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        (new \App\Questionnare())->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($this->questionnares as $questionnare) {
            DB::table('questionnares')->insert([
                'questionnare' => $questionnare,
            ]);
        }
    }
}
