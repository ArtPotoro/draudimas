@extends('layouts.main')
@section('content')

    @method('PUT')
    <form action="{{ route( 'car_gallery.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @foreach($cars as $car)
        <input type="hidden" name="car_id" value="{{ $car->id }}">
        @endforeach
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button class="btn btn-primary">Create</button>
    </form>
@endsection
