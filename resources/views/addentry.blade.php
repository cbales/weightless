<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Add an item
                </div>
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
                </form>
            </div>
        </div>
    </body>
</html>
