<?php

namespace App\Http\Controllers;

use App\History;

class HistroyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | History Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for to present logged in user access.
    | Identify a user progress histroy.
    |
    */

    /**
     * @var object
     */
    protected $history;

    /**
     * Create a new controller instance.
     *     
     * @param  object $histroy 
     * @return void
     */
    public function __construct(History $history)
    {
        $this->middleware('auth');
        $this->history = $history;
            
    }    

    /**
     * Show the application landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {           
        $history = $this->history->getUserHistory();         
        return view("history.index", ['history' => $history]);
    }    
}
