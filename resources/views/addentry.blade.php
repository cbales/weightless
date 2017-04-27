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

        @if ($ingredientsInfo != null)
        <form method="post" action="/entry/add">                
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <select name="meal">
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
                <option value="Snacks">Snacks</option>
            </select>
            <br />
            @foreach ($ingredientsInfo as $ingredientInfo)
                <input type="checkbox" name="ingredient-{{ $ingredientInfo['ingredient']->id }}" value="{{ $ingredientInfo['ingredient']->id }}">
                <input type="text" name="amount-ingredient-{{ $ingredientInfo['ingredient']->id }}">
                <select name="unit-ingredient-{{ $ingredientInfo['ingredient']->id }}">
                @foreach ($ingredientInfo['units'] as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
                </select>
                {{ $ingredientInfo['ingredient']->name }}<br />
            @endforeach
            <input type="submit" value="add">
        @endif
</div>
@endsection
