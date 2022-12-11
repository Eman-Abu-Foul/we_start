@extends('admin.master')
@section('title','Categories | '.env('APP_NAME'))
@section('header-content')
    <h1 class="m-0">{{ __('admin.all_categories') }}</h1>
@stop
@section('script')
    <script>
        function edit_category(id) {
            let url = '{{ route("admin.categories.index") }}/'+id;
            $.get({
                url,
                success: (res) => {
                    $('#editModal form').attr('action', url)
                    $('#editModal input[name=en_name]').val(res.en_name)
                    $('#editModal input[name=ar_name]').val(res.ar_name)
                    $('#editModal img').attr('src', '/'+res.image.path)
                    $('#editModal select').val(res.parent_id)
                }
            })
        }
        $('#edit_form').on('submit', function(e) {
            e.preventDefault();
            var data = new FormData(this);
            let url = $('#editModal form').attr('action');
            $.ajax({
                type: 'post',
                url,
                data,
                cache: false,
                contentType: false,
                processData: false,
                success: (res) => {
                    $('#row_'+res.id+' td:nth-child(2)').text(res.trans_name);
                    $('#row_'+res.id+' td:nth-child(3) img').attr('src', '/'+res.image.path)
                    $('#row_'+res.id+' td:nth-child(4)').text(res.parent.trans_name);
                    $('#editModal').modal('hide')
                }
            })
        })
    </script>
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif
{{--    action="{{ route('admin.categories.index') }}--}}
    <form method="GET" id="search-form" action="{{ route('admin.categories.index') }}">
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
                            <option {{ request()->count == $categories->total() ? 'selected' : '' }} value="{{ $categories->total() }}">all</option>
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
                <th style="width: 10px">#</th>
                <th>{{ __('admin.en_name') }}</th>
                <th>{{ __('admin.ar_name') }}</th>
                <th>{{ __('admin.image') }}</th>
                <th>{{ __('admin.parent') }}</th>
                <th>{{ __('admin.created_at') }}</th>
                <th>{{ __('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->en_name }}</td>
                        <td>{{ $category->ar_name }}</td>
                        <td><img width="70" src="{{ asset($category->image->path) }} " alt=""></td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->created_at->format('F m, Y') }}</td>
                        <td>
                            <a onclick="edit_category({{ $category->id }})" data-id="{{ $category->id }}" data-toggle="modal" data-target="#editModal"
                               class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></a>
                            <form class="d-inline"
                                  action="{{ route('admin.categories.destroy', $category->id) }}"
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
                        <td colspan="5">{{ __('admin.no_data_found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
{{--    {{ $categories->appends($_GET)->links() }}--}}
    {{ $categories->links() }}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit_form" action="" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>English Name</label>
                                    <input type="text" name="en_name" class="form-control" placeholder="English Name">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Arabic Name</label>
                                    <input type="text" name="ar_name" class="form-control" placeholder="Arabic Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputImage">Image</label>
                            <input type="file" name="image" class="form-control" id="inputImage">
                            <img width="60" src="{{ asset($category->image->path) }}" alt="">
                        </div>

                        <div class="form-group">
                            <label>Parent</label>
                            <select name="parent_id" class="form-control custom-select">
                                <option value="">-- Select --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->trans_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" id="save_edit">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
