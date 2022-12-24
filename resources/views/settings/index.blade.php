@extends('layouts.app')

@section('content')
@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nie zalogowano') }}</div>
                <div class="btn-toolbar" style="margin:20px;" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Third group">
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-primary" style="margin-right:20px" role="button">{{ __('Zaloguj') }}</a>
                        @endif
                    </div>
                    <div class="btn-group">
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary" role="button">{{ __('Zarejestruj') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@else


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Twoje zadania</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addtask') }}">Dodaj nowe zadanie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('assignedtask') }}">Zlecone zadania</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('history') }}">Historia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adduser') }}">Dodaj osobę</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">Osoby</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('settings') }}">Ustawienia</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h3 style="padding:20px">Ustawienia</h3>
                    <h4 style="padding:10px"> Nick: {{Auth::user()->nick}}</h4>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-pane active" id="profile">
                                        @foreach($user as $userdata)

                                        <form action="/updateuser" method="post">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Imie:</span>
                                                <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $userdata->name }}" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
                                                <input type="text" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $userdata->email }}" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Hasło:</span>
                                                <input type="text" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Zaaktualizuj profil</button>
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-top:20px">
                                <div class="card-body">
                                    <div class="tab-pane active" id="profile">
                                        <h5>STREFA NIEBEZPIECZEŃSTWA</h5>

                                        <button id="myBtn" class="btn btn-danger">Usuń moje konto</button>

                                        <div id="myModal" class="modal">

                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5>Czy na pewno chcesz usunąć konto?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form method="POST" action="/deleteuser">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <div class="modal-footer-center">
                                                        <div class="buttons">
                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Anuluj</button>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-danger" value="Usuń moje konto">
                                                            </div>
                                                        </div>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        @endguest

        @endsection