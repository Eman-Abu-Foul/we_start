@extends('admin.master')

@section('title','Cities | '.env('APP_NAME'))

@section('styles')



@endsection

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Create New City</h1>
    <form action="{{ route('admin.cities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label> Name City </label>
            <input type="text" name="name" placeholder="Enter Name City ..." class="form-control">
        </div>
        <button class="btn btn-success px-5"><i class="fas fa-plus px-1"></i>
            Create
        </button>

    </form>

@endsection
