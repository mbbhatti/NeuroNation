<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;

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
    protected $score;

    /**
     * Create a new controller instance.
     *     
     * @param  object $score 
     * @return void
     */
    public function __construct(Score $score)
    {
        $this->score = $score;
            
    }    

    /**
     * Show the application history page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {           
        $history = $this->score->getHistory();         
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
            $data = $this->score->getHistory($request->id);
        }

        return response()->json(['history' => $data]);
    }
}
