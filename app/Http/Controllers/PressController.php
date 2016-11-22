<?php

namespace App\Http\Controllers;

use App\Document;
use App\Press;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PressController extends Controller
{

    private $press;

    public function __construct(Press $press)
    {
        $this->middleware('login');
        $this->middleware('dashboard');
        $this->press = $press;
    }

    public function create()
    {

        return view('frontend.dashboard.press.create');
    }


    private function saveDocuments($document, $request, $documentName)
    {




        $document->user_id = auth()->user()->id;
        $document->document_name = $documentName;
        if($request->is_in_english =='no'){

            $document->is_translated = 1;
            $document->is_in_english = 0;
        }

        $this->press->documents()->save($document,[
            'user_id'=>auth()->user()->id,
            'document_type'=>null,
            'is_back_later'=>false
        ]);
//        $this->press->documents()->saveMany([$document]);
    }
    public function store(Request $request)
    {
//            dd($request->all()  );

        DB::transaction(function() use($request){



            $this->press->user_id = auth()->user()->id;
            $this->press->article_title = $request->article_title;
            $this->press->when_published = $request->publication_time;
            $this->press->is_confirm = false;
            $this->press->is_reviewed = false;

            if($request->is_author_given !='no'){

                $this->press->author_name = $request->article_author;
            }
            $this->press->publication_name = $request->publication_name;

            if($request->article_in_english == 'no'){
                $this->press->is_in_english = false;
            }else{
                $this->press->is_in_english = true;
            }


            $this->press->save();

            if ( $request->article_in_english =='yes' && $request->hasFile('doc_article')) {

                $document = new Document();
                $documentName = time().str_random(4).$request->file('doc_article')->getClientOriginalName();

                if( !is_null($request->file('doc_article')->move(public_path('uploads'),$documentName))){

                        $this->saveDocuments($document, $request, $documentName);

                }

            }

            if($request->article_in_english =='no'
                && $request->hasFile('doc_article_translation')
                && !$request->hasFile('doc_article')){
                $document = new Document();
                $backLater = false;
                if($request->article_translation_back_later == 'yes'){

                    $backLater = true;
                }
                $documentName = time().str_random(4).$request->file('doc_article_translation')->getClientOriginalName();

                if( !is_null($request->file('doc_article_translation')->move(public_path('uploads'),$documentName))){

                    $this->saveDocuments($document, $request, $documentName, $backLater);

                }
            }

            if ($request->publication_in_english =='yes' && $request->hasFile('doc_publication')) {
                $document = new Document();
                $backLater = false;
                if($request->publication_back_later == 'yes'){

                    $backLater = true;
                }
                $documentName = time().str_random(4).$request->file('doc_publication')->getClientOriginalName();

                if( !is_null($request->file('doc_publication')->move(public_path('uploads'),$documentName))){

                    $this->saveDocuments($document, $request, $documentName, $backLater);

                }

            }

            if ($request->publication_in_english =='no'
                && $request->hasFile('doc_publication_translation')
                && !$request->hasFile('doc_publication')) {
                $document = new Document();
                $backLater = false;
                if($request->publication_translation_back_later == 'yes'){

                    $backLater = true;
                }
                $documentName = time().str_random(4).$request->file('doc_publication_translation')->getClientOriginalName();

                if( !is_null($request->file('doc_publication_translation')->move(public_path('uploads'),$documentName))){

                    $this->saveDocuments($document, $request, $documentName, $backLater);

                }

            }



        });

       return back()->withSuccess('successfully uploaded');
       /* $request->doc_article;








        $request->article_translation_back_later;
        $request->doc_publication;
        $request->publication_back_later;
        $request->publication_in_english;
        $request->doc_publication_translation;
        $request->publication_translation_back_later;*/



       /* title
        publication_name
       publication_time
       article_author
       article_in_english
       publication_in_english
       doc_article
       doc_article_translation
       doc_publication
       doc_publication_translation
        */
    }
}
