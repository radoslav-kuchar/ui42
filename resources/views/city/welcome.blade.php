@extends('layouts.app')

@section('title')
Košík
@endsection

@section('content')

<div class="container-fluid d-flex flex-column main-background">
    <div class="row my-auto">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">
        <div class="jumbotron justify-content-center">
                <h1 class="text-center text-white display-4 mb-4" style="white-space: nowrap;">Vyhľadať v databáze obcí</h1>
                <form action="/city" method="get">
                    <input type="text" list="cities" name="city_id" placeholder="Zadajte názov" autocomplete="off" class="form-control mx-auto p-2 ps-4" style="box-shadow: 0px 0px 5px 3px rgba(0,0,0,0.25); max-width: 80%; justify-self: center;">
                    <datalist id="cities">
                        @foreach($cities as $city)
                            <option value="{{ $city->name }}">
                        @endforeach
                    </datalist>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection