@extends('admin.master')
@section('title','Invitations | '.env('APP_NAME'))
@section('header-content')
    <h1 class="m-0">All Invitations</h1>
@stop


@section('content')
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr class="bg-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Url Code</th>
            <th>Image</th>
            <th>Address</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($invitations as $invitation)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $invitation->name }}</td>
                <td>{{ $invitation->url }}</td>
                <td><img width="70" src="{{ asset($invitation->image) }} " alt=""></td>
                <td>{{ $invitation->address }}</td>
                <td>{{ $invitation->date}}</td>
                <td>
                    <a href="{{ route('admin.invitations.show',$invitation) }}"
                       class="btn btn-primary btn-sm btn-edit"><i class="fas fa-eye"></i> Read More</a>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">{{ __('admin.no_data_found') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
