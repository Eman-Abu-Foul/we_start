@extends('admin.master')
@section('title','Dashboard | '.env('APP_NAME'))

@section('header-content')
    <h1 class="m-0">Dashbord Page</h1>
    {{ QrCode::size(300)->generate('Welcome') }}
@stop

