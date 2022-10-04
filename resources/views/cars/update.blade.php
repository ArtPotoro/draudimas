@extends('layouts.main')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
        @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
        @endforeach
        </div>
    @endif



    <form action="{{ route('cars.update', $car->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Reg_number:</label>
            <input class="form-control @if ($errors->has('reg_number')) is-invalid @endif" type="text" name="reg_number" value="{{ $car->reg_number }}">
            @if ($errors->has('reg_number'))
                @foreach($errors->get('reg_number') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Brand:</label>
            <input class="form-control @if ($errors->has('brand')) is-invalid @endif" type="text" name="brand"  value="{{ $car->brand }}">
            @if ($errors->has('brand'))
                @foreach($errors->get('brand') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Model:</label>
            <input class="form-control @if ($errors->has('model')) is-invalid @endif" type="text" name="model" value="{{ $car->model }}">
            @if ($errors->has('model'))
                @foreach($errors->get('model') as $error)
                    {{$error}} <br>
                @endforeach
            @endif
        </div>
        <div  class="mb-3">
{{--            <label class="form-label">Owner_id:</label>--}}
{{--            <input class="form-control" type="text" name="owner_id"  value="{{ $car->owner_id }}">--}}
            <select class="form-control" name="owner_id">
            @foreach($owners as $owner)
                <option value="{{$owner->id}}">{{$owner->name}} {{$owner->surname}}</option>

            @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Renew</button>
    </form>
@endsection
