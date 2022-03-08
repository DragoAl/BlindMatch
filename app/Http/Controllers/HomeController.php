<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\User;
use App\Interest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function home(){
        return view('pages.home');
    }
    public function getInterests() {
        $interests = Interest::all();
        return json_encode( $interests);
    }
    public function getCheckedInterests($id){
        $user = User::findOrFail($id);
        $interests_id = DB::table('interest_user')->where('user_id', $user->id)-> get();
        $checkedInterests = [];
        foreach ($interests_id as $interest_id) {
            $checkedInterests[] =  $interest_id -> interest_id;
        }
        return json_encode( $checkedInterests);
    }
    public function getInterestsAllUsers(){
        $users = User::all();
        $userArr = [];
        foreach ($users as $user){
            //ricerca interessi di ogni utente attraveso l' user_id
            $interests_id = DB::table('interest_user')->where('user_id', $user->id)-> get();
            $interestArr = [];
            // creazione array degli id degli interessi dell'utente
            foreach ($interests_id as $interest_id){
                $interestArr[] =  $interest_id -> interest_id;
            }
            //popolamento array con associazione dell' appartamento con i suoi optionals
            $userArr[] = 
            [
                'user' => $user,
                'interests_id' => $interestArr,
            ];
        }
        return json_encode($userArr);

    }
    public function getUsers() {
        $users=User::all();
        return json_encode($users);
    }
    
    public function linkInterests(Request $request, $id) {
        $user = User::findOrFail($id);
        
        if($request->all()){
            $interests = Interest::findOrFail($request -> all());
        } else {
            $interests = [];
        }
        $user  -> interests() -> sync($interests); 
        $user -> update();
      
        return response()->json($user);

    }

}
