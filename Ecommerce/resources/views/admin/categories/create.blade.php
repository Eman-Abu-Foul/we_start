@extends('admin.master')
@section('title','Dashboard | '.env('APP_NAME'))

@section('content')
    <div class="col-md-12">

        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.new_category') }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('admin.en_name') }}</label>
                                <input type="text" name="en_name" class="form-control  @error('en_name') is-invalid @enderror" placeholder="{{ __('admin.enter_en_name') }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('admin.ar_name') }}</label>
                                <input type="text" name="ar_name" class="form-control @error('ar_name') is-invalid @enderror" placeholder="{{ __('admin.enter_ar_arabic') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputImage">{{ __('admin.image') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="inputImage">
                            <label class="custom-file-label" for="inputImage">{{ __('admin.choose_file') }}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('admin.parent') }} </label>
                        <select name="parent_id" class="form-control custom-select @error('parent_id') is-invalid @enderror">

                            <option value="">-- Select --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <button class="btn btn-success">{{ __('admin.save') }}</button>
                </div>

            </div>
        </form>

    </div>
@endsection
