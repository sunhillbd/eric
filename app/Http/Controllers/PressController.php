<?php

namespace App\Http\Controllers;

use App\Press;
use Illuminate\Http\Request;

class PressController extends Controller
{

    private $press;

    public function __construct(Press $press)
    {
        $this->middleware('dashboard');
        $this->press = $press;
    }

    public function create()
    {

        return view('frontend.dashboard.press');
    }

    public function store(Request $request)
    {

    }
}
