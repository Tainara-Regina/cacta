<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\CactaUsers;

class CactaLogoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    // 	$this->middleware('auth:cacta');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function logout(Request $request){
        Auth::logout();
        Auth::guard('cacta')->logout();
        Auth::guard('candidatos')->logout();
         $request->session()->forget('menu');
         $request->session()->forget('menu_contratante');
         $request->session()->forget('menu_candidato');
         Session::flush();
        
    	return  Redirect::to('/');
    }

}














