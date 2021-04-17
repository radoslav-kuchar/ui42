@extends('layouts.app')

@section('title')
{{ $city->name }}
@endsection

@section('content')

<div class="container-fluid d-flex flex-column bg-white justify-content-center">
    <h1 style="font-weight: 300;" class="text-center my-4">Detail obce</h1>
    <div class="row d-flex flex-row justify-content-center mx-auto info-row">
        <div class="col-lg-6 col-md-12 col-sm-12 bg-light p-4 d-flex flex-row shadow-left">
            <div class="info p-4" style="max-width: 100%; white-space: nowrap;">
                <p><strong>Meno starostu:</strong></p>
                <p><strong>Adresa obecného úradu</strong></p>
                <p><strong>Telefón</strong></p>
                <p><strong>Fax</strong></p>
                <p><strong>Email</strong></p>
                <p><strong>Web</strong></p>
                <p><strong>Zemepisné súradnice</strong></p>
            </div>
            <div class="info p-4" style="max-width: 100%;">
                <p>{{ $city->mayor_name }}</p>
                <p>{{ $city->city_hall_address }}</p>
                <p>@if($city->phone == NULL)neuvedené@else{{ $city->phone }}@endif</p>
                <p>@if($city->fax == NULL)neuvedené@else{{ $city->fax }}@endif</p>
                <p>{{ $city->email }}</p>
                <p>{{ $city->web }}</p>
                <p>@if($city->latitude == NULL || $city->longitude == NULL)neuvedené@else{{ $city->latitude }}, {{ $city->longitude }}@endif</p>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 d-flex flex-row p-4 justify-content-center shadow-right">
            <div class="erb d-flex flex-column justify-content-center">
                <img class="mx-auto pb-3" src="{{ asset('/storage/'.$city->coat_of_arms_path) }}" alt="">
                <h1>{{ $city->name }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection