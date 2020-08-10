<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Sayfalar;
use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    function index() {

        return view('Web.index');

    }
    function sayfa($slug)
    {

        $sayfa = Sayfalar::where('seourl',$slug)->first();
        if($sayfa)
            return view('Web.pages',compact('sayfa'));


    }
}
