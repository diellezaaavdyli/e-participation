<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(auth()->check()){
            return redirect()->route('frontend.issues.index');
        } else {
            return redirect()->route('frontend.auth.login');
        }
      
    }
}
