<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller
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
     * @param  object $history 
     * @return void
     */
    public function __construct(History $history)
    {
        $this->history = $history;
            
    }    

    /**
     * Show the application history page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {           
        $history = $this->history->getUserHistory();         
        return view("history.index", ['history' => $history]);
    }    

    /**
     * Show history api response.
     *
     * @param object request
     * @return object json
     */
    public function history(request $request): object
    {   
        $data = [];     
        if(isset($request->id)) {
            $data = $this->history->getUserHistory($request->id);
        }

        return response()->json(['history' => $data]);
    }
}
