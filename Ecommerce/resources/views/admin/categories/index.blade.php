@extends('admin.master')
@section('title','Dashboard | '.env('APP_NAME'))
@section('header-content')
    <h1 class="m-0">{{ __('admin.all_categories') }}</h1>
@stop
@section('content')
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif
{{--    action="{{ route('admin.categories.index') }}--}}
    <form method="GET" id="search-form" ">
        <div class="m-sm-2">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-4">
                    <div class="input-group input-group-prepend">
                        <input type="text" value="{{request()->search}}" name="search" placeholder="{{ __('admin.search_category') }}" class="form-control">
                        <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">{{ __('admin.search') }}</button>
                  </span>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group d-flex justify-content-center align-items-end row-cols-sm-6 mt-3">
                        <label>{{ __('admin.select') }}</label>
                        <select name="count" onchange="document.getElementById('search-form').submit()" class="form-control col-sm-3">
                            <option {{ request()->count == 10 ? 'selected' : '' }} value="10">10</option>
                            <option {{ request()->count == 25 ? 'selected' : '' }} value="25">25</option>
                            <option {{ request()->count == 50 ? 'selected' : '' }} value="50">50</option>
{{--                            <option {{ request()->count == $categories->total() ? 'selected' : '' }} value="{{ $categories->total() }}">all</option>--}}
                        </select>
                        <label>{{ __('admin.entries') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{ __('admin.en_name') }}</th>
                    <th>{{ __('admin.ar_name') }}</th>
                    <th>{{ __('admin.image') }}</th>
                    <th>{{ __('admin.parent') }}</th>
                    <th>{{ __('admin.actions') }}</th>
                </tr>
                </thead>
                <tbody>
{{--                @forelse ($categories as $category)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $loop->iteration }}</td>--}}
{{--                        <td>{{ $category->en_name }}</td>--}}
{{--                        <td>{{ $category->ar_name }}</td>--}}
{{--                        <td><img width="70" src="{{ asset($category->image->path) }}" alt=""></td>--}}
{{--                        <td>{{ $category->parent_id }}</td>--}}
{{--                        <td>--}}
{{--                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>--}}
{{--                            <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('delete')--}}
{{--                                <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @empty--}}
{{--                    <tr>--}}
{{--                        <td colspan="5">{{ __('admin.no_data_found') }}</td>--}}
{{--                    </tr>--}}
{{--                @endforelse--}}
                </tbody>
            </table>
{{--    {{ $categories->appends($_GET)->links() }}--}}
{{--    {{ $categories->links() }}--}}

@endsection
