@extends('layouts.app')

@section('title', 'Diary')

@section('content')

    <form id="elasticScout" action="/SearchQuery" method="get">
	     <div class="mysearchbar">
	         <input name="search" placeholder="Search...">
	     </div>
	</form>
@endsection