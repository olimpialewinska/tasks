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

@if(session()->has('Sukces'))
    <div class="alert alert-success">
        <div class="row justify-content-center">

        {{ session()->get('Sukces') }}
        </div>
    </div>
@endif


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
                            <a class="nav-link active" href="{{ route('users') }}">Osoby</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings') }}">Ustawienia</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($relations->isEmpty())
                        <div class="row justify-content-center">
                        <h3>Brak osób</h3>
                        <p>Aby zacząć przygode z naszym programem, dodaj osoby.</p>
                        <a type="button" class="btn btn-primary" style="width:200px" href="{{ route('adduser') }}">Dodaj osobę</a>
                        </div>
                        @else
                        <h3 style="padding:20px">Osoby</h3>
                        <table class="table table-hover">
                            <thead>
                            <tr class="table-primary">
                                    <th scope="col">Nick</th>
                                    <th scope="col">Imie</th>
                                    <th scope="col">Akcja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($relations as $relations)
                                <tr>
                                    <td>{{$relations->nick2}}</td>
                                    <td>{{$relations->name2}}</td>
                                    <td><a type="button" class="link-danger" href="/deleterel/{{$relations->id}}">Usuń</a></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        @endguest

        @endsection