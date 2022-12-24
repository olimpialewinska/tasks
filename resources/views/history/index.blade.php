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
                            <a class="nav-link active" href="{{ route('history') }}">Historia</a>
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
                    <h3 style="padding:20px">Historia</h3>

                    <h5>Moje zadania</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Od:</th>
                                <th scope="col">Tytuł:</th>
                                <th scope="col">Opis:</th>
                                <th scope="col">Data zakończenia:</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($zadaniadlamnie as $task)
                            @if($task->status == 'Odrzucono')
                            <tr class="table-danger">
                                @elseif($task->status == "Wykonano")
                            <tr class="table-success">
                                @else
                            <tr class="table-warning">
                                @endif
                                @if($task->requser == Auth::user()->id)
                                <td>Ja</td>
                                @else
                                <td>{{ $task->requsername }}</td>
                                @endif
                                <td>{{ $task->title }}</td>
                                <td><a class="link-primary" type="button" href="/description/{{$task->id}}">Zobacz opis</a></td>
                                <td>{{$task->date}}</td>
                                <td>{{$task->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5 style="padding:20px">Zlecone zadania</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Dla:</th>
                                <th scope="col">Tytuł:</th>
                                <th scope="col">Opis:</th>
                                <th scope="col">Data zakończenia:</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($zadaniadlainnych as $task)
                            @if($task->status == "Odrzucono")
                            <tr class="table-danger">
                                @elseif($task->status == "Wykonano")
                            <tr class="table-success">
                                @else
                            <tr class="table-warning">
                                @endif
                                @if($task->exeuser == Auth::user()->id)
                                <td>Ja</td>
                                @else
                                <td>{{ $task->exename }}</td>
                                @endif
                                <td>{{ $task->title }}</td>
                                <td><a class="link-primary" type="button" href="/description/{{$task->id}}">Zobacz opis</a</td>
                                <td>{{$task->date}}</td>
                                <td>{{$task->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endguest
            @endsection