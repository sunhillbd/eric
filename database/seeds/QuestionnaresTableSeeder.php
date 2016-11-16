<?php

use Illuminate\Database\Seeder;

class QuestionnaresTableSeeder extends Seeder
{


    private $questionnares = [
        'Select document to upload'=>'article_document',
        'What is the title of this article'=>'article_text',
        'What is the name of the publication in which this article appeared'=>'article_text',
        'When was this article published'=>'article_text',
        'What is the name of the article\'s author'=>'article_text',
        'Upload a translation of the article with certification'=>'article_translated',
        'Please upload evidence of the publication\'s circulation or readership'=>'publication_document',
        'Upload a translation of the document with certification'=>'publication_translated',
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

        foreach ($this->questionnares as $questionnare=>$qt) {
            DB::table('questionnares')->insert([
                'questionnare' => $questionnare,
                'questionnare_type' => $qt,
            ]);
        }
    }
}
