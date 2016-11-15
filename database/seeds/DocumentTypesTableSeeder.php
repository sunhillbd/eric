<?php

use Illuminate\Database\Seeder;

class DocumentTypesTableSeeder extends Seeder
{
    private $documentTypes = ['article_in_english','translated_article','publication_circulation','translated_publication_circulation'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        (new \App\DocumentType())->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($this->documentTypes as $documentType) {
            DB::table('document_types')->insert([

                'document_type' => $documentType,

            ]);
        }
    }
}
