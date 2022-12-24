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
    <div class="card-body">
                    <h3 style="padding:20px">Edytowanie zadania</h3>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <form action="/update/{{$task->id}}" method="post">
                            @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Zadanie:</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="title" value="{{ $task->title }}" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Data wykonania:</span>
                                    <input type="date" id="txtDate" name="date" value="{{ $task->date}}">
                                </div>
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" data-val="true" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" data-val-length="Maximum = 2045 characters" data-val-length-max="2045" id="info" name="description" rows="3" style="width:100%" required>{{ $task->description }}</textarea>

                                </div>
                            
                                <div class="d-grid gap-5 d-md-flex justify-content-md-center">
                                <a class="btn btn-outline-primary me-md-2" style="width:100px"type="button" href="{{route('home')}}">Anuluj</a>
                                <button type="submit" class="btn btn-primary" style="width:100px">Gotowe</button>
                                </div>
                            </form>
                        </div>
                    </div>
</div>

        
           
    </div>
</div>


        @endguest

        @endsection