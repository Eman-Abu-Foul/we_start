@extends('admin.master')

@section('title','Cities | '.env('APP_NAME'))
@section('content')
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

@endsection
