@extends('layouts.app')

@section('title', 'Create a new diary entry')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Add an item
    </div>
        <form id="elasticScout" action="/SearchQuery" method="get">
            <div class="mysearchbar">
                <input name="search" placeholder="Search...">
            </div>
        </form>

        @if ($ingredients != null)
        <form method="post">                
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @foreach ($ingredients as $ingredient)
                <input type="checkbox" name="ingredient-{{ $ingredient->id }}" value="{{ $ingredient->id }}">
                <input type="text" name="amount-ingredient-{{ $ingredient->id }}">
                <select name="unit-ingredient-{{ $ingredient->id }}">
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
                </select>
                {{ $ingredient->name }}<br />
            @endforeach
            <input type="submit" value="add">
        @endif
</div>
@endsection
