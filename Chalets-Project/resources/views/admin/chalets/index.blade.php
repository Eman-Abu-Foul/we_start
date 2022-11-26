@extends('admin.master')
@section('title','Dashboard | '.env('APP_NAME'))
@section('header-content')
    <h1 class="m-0">{{ __('admin.all_chalets') }}</h1>
@stop
@section('content')

    <form method="GET" id="search-form" action="{{ route('admin.chalets.index') }}">
        <div class="m-sm-2">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-4">
                    <div class="input-group input-group-prepend">
                        <input type="text" value="{{request()->search}}" name="search" placeholder="{{ __('admin.search_chalet') }}" class="form-control">
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
                            <option {{ request()->count == $chalets->total() ? 'selected' : '' }} value="{{ $chalets->total() }}">all</option>
                        </select>
                        <label>{{ __('admin.entries') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
    @endif
    <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{ __('admin.name') }}</th>
                    <th>{{ __('admin.image') }}</th>
                    <th>{{ __('admin.address') }}</th>
                    <th>{{ __('admin.description') }}</th>
                    <th>{{ __('admin.price') }}</th>
                    <th>{{ __('admin.price_special') }}</th>
                    <th>{{ __('admin.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($chalets as $chalet)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $chalet->name }}</td>
                        <td><img width="100" src="{{ asset('uploads/'.$chalet->image->path) }}" alt=""></td>

                        <td>{{ $chalet->address }}</td>
                        <td>{{ $chalet->desc }}</td>
                        <td>{{ $chalet->price }}</td>
                        <td>{{ $chalet->price_special }}</td>
                        <td>
                            <a href="{{ route('admin.chalets.edit', $chalet->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <form class="d-inline" action="{{ route('admin.chalets.destroy', $chalet->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">{{ __('admin.no_data_found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
    {{ $chalets->appends($_GET)->links() }}
{{--    {{ $chalets->links() }}--}}

@endsection
