<div>
	<div class="meal" id="breakfast">
		<h2>Breakfast</h2>
		@foreach ($breakfast as $item)
			<div class="meal-item" id="meal-item-{{ $item->id }}">
				{{ $item->quantity }}
			</div>
		@endforeach
	</div>

	<div class="meal" id="lunch">
		<h2>Lunch</h2>
		@foreach ($lunch as $item)
			<div class="meal-item" id="meal-item-{{ $item->id }}">
				{{ $item->quantity }}
			</div>
		@endforeach
	</div>

	<div class="meal" id="dinner">
		<h2>Dinner</h2>
		@foreach ($dinner as $item)
			<div class="meal-item" id="meal-item-{{ $item->id }}">
				{{ $item->quantity }}
			</div>
		@endforeach
	</div>

	<div class="meal" id="snacks">
		<h2>Snacks</h2>
		@foreach ($snacks as $item)
			<div class="meal-item" id="meal-item-{{ $item->id }}">
				{{ $item->quantity }}
			</div>
		@endforeach
	</div>
</div>