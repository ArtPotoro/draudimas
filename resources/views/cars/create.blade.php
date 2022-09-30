@extends('layouts.main')
@section('content')




    <form action="{{ route('cars.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Reg_number:</label>
            <input class="form-control" type="text" name="reg_number">
        </div>
        <div  class="mb-3">
            <label class="form-label">Brand:</label>
            <input class="form-control" type="text" name="brand">
        </div>
        <div class="mb-3">
            <label class="form-label">Model:</label>
            <input class="form-control" type="text" name="model">
        </div>
        <div  class="mb-3">
            <label class="form-label">Owner_id:</label>
            <input class="form-control" type="text" name="owner_id">
        </div>


        <button class="btn btn-primary">Add</button>
    </form>
@endsection
