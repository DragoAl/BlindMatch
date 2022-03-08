<header>
    <h1>BlindMatch</h1>
    @guest
        <div id="header-drop" class="dropdown">
            <button class="btn btn-custom dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
               <b>Accedi o Registrati</b> 
            </button>
            <div class="dropdown-menu">
                <div class="forms-container">
                   
                    {{-- login  --}}
                    <form class="px-4 py-3" action="{{route('login')}}" method="POST">
                        @method("POST")
                        @csrf
                        
                        <h3>Login</h3>
                        <div class="mb-1">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"  placeholder="email@example.com">
                        </div>
                        <div class="mb-1">
                            <label  class="form-label">Password</label>
                            <input type="password" class="form-control" name="password"  placeholder="Password">
                        </div>
                    
                        <input type="submit" class="btn btn-custom mt-2" value="login" >
                    </form>
                
                    {{-- registration --}}
                    <form class="px-4 py-3" action="{{route('register')}} "  method="POST">
                        @method("POST")
                        @csrf
                        
                        <h3> Register </h3>
                        <div class="mb-2">
                            <label class="form-label" for="name">Nome:</label><br>
                            <input class="form-control"type="text" name="name" placeholder="Nome"><br>
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="lastname">Cognome</label><br>
                            <input class="form-control"type="text" name="lastname" placeholder="Cognome"><br>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="date_of_birth">Data di nascita</label><br>
                            <input class="form-control"type="date" name="date_of_birth" placeholder="Data di nascita"><br>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="email">Email:</label><br>
                            <input class="form-control"type="email" name="email" placeholder="Email" ><br>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="password">Password:</label><br>
                            <input class="form-control"type="password" name="password" placeholder="Password di almeno 8 caratteri"><br>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="password_confirmation">Conferma Password:</label><br>
                            <input class="form-control"type="password" name="password_confirmation" placeholder="conferma password"><br>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="gender">Sesso:</label><br>
                            <select class="form-control" name="gender">
                                <option  value="Maschio">Maschio</option>
                                <option value="Femmina">Femmina</option>
                            </select><br>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="gender_like">Mi Piacciono:</label><br>
                            <select class="form-control" name="gender_like">
                                <option  value="Maschio">Maschio</option>
                                <option value="Femmina">Femmina</option>
                            </select><br>
                        </div>
                        <div class="mb-2">
                            <input class="btn btn-custom mt-2" type="submit" value="Register">
                        </div>
                    </form>
                </div>                                      
            </div>
        </div>
    @endguest

    @auth
        <div>
            <h3 class="welcome">Benvenuto {{Auth::user() -> name}} </h3>
            <a href="{{route('logout')}}" class="btn btn-custom">Logout</a>
        </div>        
    @endauth
</header>