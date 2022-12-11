@extends('admin.master')
@section('title','Product | '.env('APP_NAME'))
@section('header-content')
    <h1 class="m-0">{{ __('admin.all_products') }}</h1>
@stop
@section('script')

@endsection

@section('content')


    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <form method="GET" id="search-form" action="{{ route('admin.products.index') }}">
        <div class="m-sm-2">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-4">
                    <div class="input-group input-group-prepend">
                        <input type="text" value="{{request()->search}}" name="search" placeholder="{{ __('admin.search_product') }}" class="form-control">
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
                            <option {{ request()->count == $products->total() ? 'selected' : '' }} value="{{ $products->total() }}">all</option>
                        </select>
                        <label>{{ __('admin.entries') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr class="bg-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Category</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($products as $product)
            {{-- @dump($product->image) --}}
            <tr id="row_{{ $product->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->trans_name }}</td>
                <td><img width="70" src="{{ asset($product->image->path??'') }}" alt="">
                </td>
                <td>{{ $product->category->trans_name }}</td>
                <td>{{ $product->created_at->format('F m, Y') }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}"
                       class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></a>
                    <form class="d-inline"
                          action="{{ route('admin.products.destroy', $product->id) }}"
                          method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure?!')"
                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $products->links() }}

@endsection
