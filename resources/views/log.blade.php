@extends('layouts.app')

@section('title', 'Diary')

@section('content')

    <div class="diary">
        <div class="diary-day">
            <p>Monday, May 14th</p>
        </div>
        <div class="entry-list">
            <div class="entry-section" id="breakfast">
                <div class="section-title">
                    Breakfast
                </div>
                @foreach ($breakfast as $item)
				<div class="entry" id="entry-{{ $item->id }}">
					<div class="entry-img">
						<img src="img/walnuts.png" alt="walnuts" />
					</div>
					<div class="entry-name">
						{{ $item->ingredient->name }}
					</div>
					<div class="entry-calories">
						{{ $item->quantity }}
					</div>
				</div>
				@endforeach
            </div>
        </div>
        <div class="add-entry">
        	<form action="/entry/add">
        		<input type="submit" value="Add a new item" />
        	</form>
        </div>
    </div>
@endsection