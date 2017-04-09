@extends('layouts.app')

@section('title', 'Diary')

@section('content')

    <div class="diary">
        @foreach ($ingredients as $ingredient)
        <p> {{ $ingredient.name }} </p>
        @endforeach
    </div>
    <p>end</p>
@endsection