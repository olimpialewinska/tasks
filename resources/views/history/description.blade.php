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
        <div class="card">
            <div class="card-body">
                <h3 style="padding:20px">{{ $task->title }}</h3>
                <p>Opis: {{ $task->description }} </p>
                <p>Osoba wykonująca: {{ $task->exename }} </p>
                <p>Data zlecenia: {{ $task->created_at }} </p>
                <p>Status: {{ $task->status }} </p>
                @if($task->status == "Odrzudono")
                <p>Data odrzucenia: {{ $task->updated_at }} </p>
                @elseif($task->status == "Wykonano")
                <p>Data wykonania: {{ $task->updated_at }} </p>
                @else
                <p>Data odrzucenia przez nadawcę: {{ $task->updated_at }} </p>
                @endif
                <a href="{{ route('history') }}" class="btn btn-primary" style="margin:20px" role="button">Powrót</a>
            </div>
        </div>
    </div>
</div>


@endguest

@endsection