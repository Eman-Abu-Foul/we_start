@extends('admin.master')
@section('title','Dashboard | '.env('APP_NAME'))

@section('content')
    <div class="col-md-12">

        <form action="{{ route('admin.chalets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">{{ __('admin.new_chalet') }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __('admin.name') }}</label>
                                <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror"
                                       value="{{old('name')}}" placeholder="{{ __('admin.enter_name') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">{{ __('admin.image') }}</label>
                        <div class="custom-file">
                            @error('images')
                            <span class="text-red"> {{$message}}</span>
                            @enderror
                            <input type="file" class="custom-file-input" name="image" id="image">
                            <label class="custom-file-label" for="image[]" multiple>{{ __('admin.choose_file') }}</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('admin.price') }}</label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                                       value="{{old('price')}}" placeholder="{{ __('admin.enter_price') }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('admin.price_special') }}</label>
                                <input type="number" name="price_special" id="price_special" class="form-control @error('price_special') is-invalid @enderror"
                                       value="{{old('price_special')}}" placeholder="{{ __('admin.enter_price_special') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('admin.address') }}</label>
                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                               value="{{old('address')}}" placeholder="{{ __('admin.enter_address') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('admin.description') }}</label>
                        <textarea rows="4" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror"
                                   placeholder="{{ __('admin.enter_desc') }}">
                          {{old('desc')}}
                        </textarea>
                    </div>




                    <button class="btn btn-success">{{ __('admin.save') }}</button>
                </div>

            </div>
        </form>

    </div>
@endsection
