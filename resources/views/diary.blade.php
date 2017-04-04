@extends('layouts.app')

@section('title', 'Diary')

@section('content')
    <div class="diary">
        <div class="diary-day">
            <p>Monday, May 14th</p>
        </div>
        <div class="entry-list">
            <div class="entry-section">
                <div class="section-title">
                    Breakfast
                </div>
                <div class="entry">
                    <div class="entry-img">
                        <img src="img/walnuts.png" alt="walnuts" />
                    </div>
                    <div class="entry-name">
                        Walnuts
                    </div>
                    <div class="entry-calories">
                        80
                    </div>
                </div>
                <div class="entry">
                    <div class="entry-img">
                        <img src="img/yogurt.png" alt="yogurt" />
                    </div>
                    <div class="entry-name">
                        Yogurt
                    </div>
                    <div class="entry-calories">
                        220
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection