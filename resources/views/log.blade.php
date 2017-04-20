@extends('layouts.app')

@section('title', 'Diary')

@section('content')


    <div class="diary">
        <div class="diary-day">
            <div class="nav"><a href="/log/{{ $prev }}"> < </a></div>
            <div class="date"><p>{{ $date }}</p></div>
            <div class="nav"><a href="/log/{{ $next }}"> > </a></div>
        </div>

        <form action="/entry" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="entry-list">
            <div class="entry-section" id="breakfast">
                <div class="section-title">
                    Breakfast
                </div>
                @foreach ($breakfast as $item)
				<div class="entry" id="entry-{{ $item->id }}">
					<div class="entry-name">
						{{ $item->ingredient->name }}
					</div>
					<div class="entry-calories">
						{{ $item->quantity }}
					</div>
				</div>
				@endforeach
                <button name="entry-time" type="submit" value="breakfast"> + </button>
            </div>
            <div class="entry-section" id="lunch">
                <div class="section-title">
                    Lunch
                </div>
                @foreach ($lunch as $item)
                <div class="entry" id="entry-{{ $item->id }}">
                    <div class="entry-name">
                        {{ $item->ingredient->name }}
                    </div>
                    <div class="entry-calories">
                        {{ $item->quantity }}
                    </div>
                </div>
                @endforeach
                <button type="submit" value="lunch"> + </button>
            </div>
            <div class="entry-section" id="dinner">
                <div class="section-title">
                    Dinner
                </div>
                @foreach ($dinner as $item)
                <div class="entry" id="entry-{{ $item->id }}">
                    <div class="entry-name">
                        {{ $item->ingredient->name }}
                    </div>
                    <div class="entry-calories">
                        {{ $item->quantity }}
                    </div>
                </div>
                @endforeach
                <button type="submit" value="dinner"> + </button>
            </div>
            <div class="entry-section" value="snacks">
                <div class="section-title">
                    Snacks
                </div>
                @foreach ($snacks as $item)
                <div class="entry" id="entry-{{ $item->id }}">
                    <div class="entry-name">
                        {{ $item->ingredient->name }}
                    </div>
                    <div class="entry-calories">
                        {{ $item->quantity }}
                    </div>
                </div>
                @endforeach
                <button type="submit" value="snacks"> + </button>
            </div>
        </div>
        </form>
    </div>
@endsection