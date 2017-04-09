@extends('layouts.app')

@section('title', 'Diary')

@section('content')

@if(!empty($ingredients))
    @foreach($ingredients as $ingredient)
        <h1>{{ $ingredient->name }} </h1>
    @endforeach
@endif

@endsection