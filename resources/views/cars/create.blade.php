@extends('layouts.main')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('cars.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Reg_number:</label>
            <input class="form-control @if ($errors->has('reg_number')) is-invalid @endif" type="text" name="reg_number" value="{{old('reg_number')}}">
            @if ($errors->has('reg_number'))
                @foreach($errors->get('reg_number') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Brand:</label>
            <input class="form-control @if ($errors->has('brand')) is-invalid @endif" type="text" name="brand" value="{{old('brand')}}">
            @if ($errors->has('brand'))
                @foreach($errors->get('brand') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Model:</label>
            <input class="form-control @if ($errors->has('model')) is-invalid @endif" type="text" name="model" value="{{old('model')}}">
            @if ($errors->has('model'))
                @foreach($errors->get('model') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Owner_id:</label>
            <input class="form-control @if ($errors->has('owner_id')) is-invalid @endif" type="text" name="owner_id" value="{{old('owner_id')}}">
            @if ($errors->has('owner_id'))
                @foreach($errors->get('owner_id') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>


        <button class="btn btn-primary">Add</button>
    </form>
@endsection
