<?php

namespace App\Http\Controllers;

use App\Questionnare;
use Illuminate\Http\Request;

class QuestionnareController extends Controller
{
    private $questionnares;


    public function __construct(Questionnare $questionnare)
    {
        $this->questionnares = $questionnare;
    }

    public function getForm($form)
    {
        return view('frontend.dashboard.'.$form);
    }
    public function store(Request $request)
    {
        dd(55);
    }
}
