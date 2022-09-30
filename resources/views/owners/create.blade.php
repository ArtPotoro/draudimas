@extends('layouts.main')
@section('content')






    <form action="{{ route('owners.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div  class="mb-3">
            <label class="form-label">Surname:</label>
            <input class="form-control" type="text" name="surname">
        </div>


        <button class="btn btn-primary">Add</button>
    </form>
@endsection
