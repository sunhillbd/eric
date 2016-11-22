<?php

namespace App\Http\Controllers;

use App\FormCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function getDashboard(FormCategory $formCategory)
    {


        $formCategories = auth()->user()->formCategories()->get();

        return view('frontend.dashboard.index',compact('formCategories'));
    }

    public function viewCategoryDetails($formCategory)
    {
        $authUser = auth()->user();
        $directory = $formCategory;
        $formCategory = studly_case($formCategory);
        $modelNamespce = "App\\$formCategory";
        $modelObj = new $modelNamespce;

        $formData  =  $modelObj->whereUserId($authUser->id)->get();

        return view('frontend.dashboard.'.$directory.'.view', compact('formData'));

    }

    public function goToSettings()
    {
        return view('frontend.dashboard.settings.index');
    }
}
