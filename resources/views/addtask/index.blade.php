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
                            <a class="nav-link active" href="{{ route('addtask') }}">Dodaj nowe zadanie</a>
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
                            <a class="nav-link" href="{{ route('settings') }}">Ustawienia</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h3 style="padding:20px"> Dodaj zadanie</h3>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <form action="add-task" method="post">
                            @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Zadanie:</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="title" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Zadanie dla:</span>
                                    <select class="" name="user" id="user">
                                        <option value="{{ Auth::user()->id}}">{{ Auth::user()->name}}</option>
                                        @foreach($relations as $relations)
                                        <option value="{{ $relations->user2 }} ">{{ $relations->name2 }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data wykonania:</span>
                                    <input type="date" id="txtDate" name="date">
                                </div>
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" data-val="true" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" data-val-length="Maximum = 2045 characters" data-val-length-max="2045" id="info" name="description" rows="3" style="width:100%" placeholder="Opis..." required></textarea>

                                </div>
                                <button type="submit" class="btn btn-primary btn-block mb-4">Dodaj</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        @endguest

        @endsection