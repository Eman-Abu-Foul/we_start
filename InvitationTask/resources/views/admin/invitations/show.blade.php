@extends('admin.master')
@section('title','Invitations | '.env('APP_NAME'))
@section('header-content')
    <h1 class="m-0">Invitations</h1>
@stop

@section('style')
    <style>
    </style>
@stop
@section('content')

    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <form method="post" action="{{ route('admin.invitations.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name of Invitation</label>
                        <input disabled type="text" name="name" value="{{ $invitation->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="date">date of Invitation</label>
                        <input disabled type="date" name="date" value="{{ $invitation->date }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input disabled type="text" name="address" value="{{ $invitation->address }}" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="inputImage">Image</label>
                        <div class="custom-file">
                            <img width="70" src="{{ asset($invitation->image) }} " alt="">
                        </div>
                    </div>

                    <hr>

                </form>
            </div>
                        <div class="col-4">
                            {{ QrCode::generate($invitation->url) }}
                        </div>
{{--            <div class="col-4">--}}
{{--                @if (session('code'))--}}
{{--                    @if (pathinfo(session('code'))['extension'] === 'eps')--}}
{{--                        QR Code available, <a href="{{ asset('qr_code/' . session('code')) }}">click here</a> to download it.--}}
{{--                    @else--}}
{{--                        <img src="{{ asset('qr_code/' . session('code')) }}" alt="{{ session('code') }}" class="img-fluid">--}}
{{--                    @endif--}}
{{--                @endif--}}
{{--            </div>--}}
        </div>
    </div>

@endsection
