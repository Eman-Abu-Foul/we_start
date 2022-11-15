@extends('admin.master')

@section('title','Places | '.env('APP_NAME'))

@section('styles')



@endsection

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Create New Place</h1>
    <form action="{{ route('admin.places.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label> Name Place </label>
            <input type="text" name="name" placeholder="Enter Name Place ..." class="form-control">
        </div>
        <div class="mb-3">
            <label> Image </label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label> Price </label>
            <input type="number" name="price" placeholder="Enter Price" class="form-control">
        </div>
        <div class="mb-3">
            <label> Description </label>
            <textarea name="description" placeholder="Enter Description" rows="5" class="form-control">

            </textarea>
        </div>
        <button class="btn btn-success px-5"><i class="fas fa-plus px-1"></i>
            Create
        </button>

    </form>

@endsection
@section('script')
{{--    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" referrerpolicy="origin"></script>
<script>
        tinymce.init({
            selector: 'textarea',
            plugins:['code'],
        });
    </script>
@endsection
