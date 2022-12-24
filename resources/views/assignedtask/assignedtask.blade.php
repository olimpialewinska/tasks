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
                            <a class="nav-link active" href="{{ route('assignedtask') }}">Zlecone zadania</a>
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
                    <h3 style="padding:20px"> Zlecone zadania</h3>
                    <div class="row">
                        @foreach($zadania as $task)
                        <div class="col-sm-6 col-md-6" style="padding:10px">
                            <div class="card">
                                <div class="card-header" style="font-weight: 900;">{{ $task->title }}</div>
                                <div class="card-body">
                                <p class="fw-lighter">Dla: {{ $task->exename }}</p>
                                @if($task->date!=" ")
                                    <p class="fw-lighter">Data wykonania: {{ $task->date }}</p>
                                    @endif
                                    @if($task->requser != Auth::user()->id)
                                    <p class="fw-lighter">Od: {{ $task->requsername }}</p>
                                    @endif
                                    <p class="card-text">{{ $task->description }}</p>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <a class="btn btn-outline-primary me-md-2" type="button" href="/editassigned/{{$task->id}}">Edytuj</a>
                                        <a class="btn btn-outline-danger" type="button" href="/deleteassigned/{{$task->id}}">Usuń</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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