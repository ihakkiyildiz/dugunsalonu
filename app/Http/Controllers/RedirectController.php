<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    //
    function success($msg)
    {
        return redirect()->back()
            ->with('status','ok')
            ->with('message',$msg)
            ->with('type','success')
            ->with('icon','fa-check');
    }
    function fail($msg) {
        return redirect()->back()
            ->with('status','ok')
            ->with('message',$msg)
            ->with('type','danger')
            ->with('icon','fa-exclamation');
    }
}
