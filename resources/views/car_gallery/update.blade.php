@extends('layouts.main')
@section('content')

    @method('PUT')
    <form action="{{ route('car_gallery.update', $carGallery->car_id) }}" method="post" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button class="btn btn-primary">Renew</button>
    </form>
@endsection
