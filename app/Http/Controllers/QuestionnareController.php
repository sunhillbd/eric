<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Category;
use App\Document;
use App\Questionnare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionnareController extends Controller
{
    private $questionnares;


    public function __construct(Questionnare $questionnare)
    {
        $this->questionnares = $questionnare;
    }

    public function getForm($form, Category $category)
    {

        $questionnares = $category->with('questionnares')->whereCategoryName($form)->first()->questionnares;
//dd($questionnares);
        return view('frontend.dashboard.'.$form,compact('questionnares','form'));
    }
    public function store(Category $category,Answer $answer, Request $request)
    {




        $category = $category->whereCategoryName(ucfirst($request->category))->first();

        $user = auth()->user();

        DB::transaction(function() use($category,$answer,$user,$request){

            foreach($request->{$request->category.'_text'} as  $questionnareId =>$answerText){

                $answer->create([
                    'user_id'=> isset($user->id)?$user->id:0,
                    'category_id'=>!is_null($category)?$category->id:0,
                    'questionnare_id'=>$questionnareId,
                    'answer'=>$answerText,
                ]);
            }

            foreach ($request->{$request->category . '_is_answered'} as $questionnareId => $answer) {

                $user->questionnares()->attach($questionnareId,[
                    'category_id'=>!is_null($category)?$category->id:0,
                    'is_back_later'=>$answer=='yes'?1:0
                ]);
            }

            if($request->hasFile('press_document')){

                foreach ($request->press_document as $questionareId => $userDocument) {

                    $document = new Document();

                    $documentName = time().str_random(4).$userDocument->getClientOriginalName();

                    if( !is_null($userDocument->move(public_path('uploads'),$documentName))){

                        $document->document_type_id = 0;
                        $document->user_id = 0;
                        $document->file_name = $documentName;
                        $document->is_in_english = 0;

                        $document->save();


                        $document->categories()->attach($category->id,[
                                'questionnare_id'=>$questionareId,
                                'is_active'=>0,
                            ]
                        );
                    }

                }
            }

            if($request->hasFile('press_translated')){

                foreach ($request->press_translated as $questionareId => $userDocument) {

                    $document = new Document();
                    $documentName = time().str_random(4).$userDocument->getClientOriginalName();

                    if( !is_null($userDocument->move(public_path('uploads'),$documentName))){


                        $document->document_type_id = 0;
                        $document->user_id = 0;
                        $document->file_name = $documentName;
                        $document->is_in_english = 1;

                        $document->save();

                        $document->categories()->attach($category->id,[
                                'questionnare_id'=>$questionareId,
                                'is_active'=>0,
                            ]
                        );
                    }
                }
            }


        });


        return back()->with('success','successfully saved');


    }
}
