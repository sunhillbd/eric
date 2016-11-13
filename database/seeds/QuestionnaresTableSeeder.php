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
        'Major Commercial Success'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
