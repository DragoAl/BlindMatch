@extends('layouts.main-layout')
@section('content')
    <div class="home-container">
        @auth
            <create-component :userlog="{{ json_encode(Auth::user()) }}"></create-component>
            <allusers-component :userlog="{{ json_encode(Auth::user()) }}"></allusers-component>
        @endauth
         
    </div>
    @guest
               
        <h1 id="Title-notLogged">BlindMatchb <br> il primo sito per conoscere l'anima gemella... <br>... senza il bisogno di vederla</h1>
    @endguest  
   
    
    

    
@endsection