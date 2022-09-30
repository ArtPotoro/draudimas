@extends('layouts.main')
@section('content')





    <form action="{{ route('cars.update', $car->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Reg_number:</label>
            <input class="form-control" type="text" name="reg_number" value="{{ $car->reg_number }}">
        </div>
        <div  class="mb-3">
            <label class="form-label">Brand:</label>
            <input class="form-control" type="text" name="brand"  value="{{ $car->brand }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Model:</label>
            <input class="form-control" type="text" name="model" value="{{ $car->model }}">
        </div>
        <div  class="mb-3">
            <label class="form-label">Owner_id:</label>
            <input class="form-control" type="text" name="owner_id"  value="{{ $car->owner_id }}">
        </div>

        <button class="btn btn-primary">Renew</button>
    </form>
@endsection
