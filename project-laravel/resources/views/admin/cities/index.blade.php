@extends('admin.master')

@section('title','Cities | '.env('APP_NAME'))

@section('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .table th,
        .table td{
            vertical-align : middle
        }
        .div-input{
            display: flex;
            justify-content: space-between
        }
        .selector{
            display: inline-flex;
            justify-content: space-between;
            align-items: center;
            vertical-align : middle;

        }
    </style>
@endsection
@section('content')
    <h1 class="h3 mb-4 text-gray-800">All Cities</h1>
    <form method="GET" id="search-form" action="{{ route('admin.cities.index') }}">
        <div class="input-group mb-3 div-input">
            <div class="input-group-prepend mb-3">
                <input type="text" class="form-control" value="{{request()->search}}" name="search" placeholder="Search Name City ...">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark px-4" >Search</button>
                </div>
            </div>
            <div>
                <label class="selector"> Show
                    <select name="count" onchange="document.getElementById('search-form').submit()" id class="custom-select row-cols-sm-3">
                        <option {{ request()->count == 10 ? 'selected' : '' }} value="10">10</option>
                        <option {{ request()->count == 25 ? 'selected' : '' }} value="25">25</option>
                        <option {{ request()->count == 50 ? 'selected' : '' }} value="50">50</option>
                        <option {{ request()->count == $cities->total() ? 'selected' : '' }} value="{{ $cities->total() }}">all</option>
                    </select>
                     entries
                </label>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-hover table-striped">
        <thead class="bg-dark text-white">
            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </thead>
        <tbody>
        @forelse($cities as $city)
            <tr>
                <td>{{ $city->id }}</td>
                <td>{{ $city->name }}</td>
                <td>{{ $city->created_at }}</td>
                <td>{{ $city->updated_at }}</td>
                <td>
                    <a href="#" class="btn btn-success btn-sm"> <i class="fas fa-eye"></i> </a>
                    <a href="#" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                    <a href="#" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Data Found</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $cities->appends($_GET)->links() }}
@endsection
