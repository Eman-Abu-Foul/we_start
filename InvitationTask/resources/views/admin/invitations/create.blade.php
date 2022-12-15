@extends('admin.master')
@section('title','Create Invitation | '.env('APP_NAME'))

@section('content')
<div class="card">
    <div class="card-header d-flex">
    Create New Invitation
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-8">
                <form method="post" action="{{ route('admin.invitations.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name of Invitation</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="url">URl QR Code</label>
                        <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                        @error('url')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="date">date of Invitation</label>
                        <input type="date" name="date" value="{{ old('date') }}" class="form-control">
                        @error('date')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="inputImage">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="inputImage">
                            <label class="custom-file-label" for="inputImage">choose file</label>
                            @error('image')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                       <hr>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>


                </form>
            </div>
{{--            <div class="col-4">--}}
{{--                {{ QrCode::generate('Make me into a QrCode!') }}--}}
{{--            </div>--}}
            <div class="col-4">
                @if (session('code'))
                    @if (pathinfo(session('code'))['extension'] === 'eps')
                        QR Code available, <a href="{{ asset('qr_code/' . session('code')) }}">click here</a> to download it.
                    @else
                        <img src="{{ asset('qr_code/' . session('code')) }}" alt="{{ session('code') }}" class="img-fluid">
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
