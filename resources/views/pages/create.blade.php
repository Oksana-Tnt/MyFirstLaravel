@extends('layout.layout')

@section('title', 'Modificare')

@section('content')
<h1>Create new pizza</h1>

<form action="{{route('store')}} " method="POST">
    @csrf
    <label for="gusto">Gusto</label>
    <input type="text" id="gusto" value="{{old('gusto')}}" name="gusto" class="form-control">

    <label for="prezzo">Prezzo</label>
    <input type="number" id="prezzo" value="{{old('prezzo')}}" name="prezzo" class="form-control">

    <label for="available">Disponibilita</label>
    <select name="available" id="available" class="form-control">
        <option value=1>Si</option>
        <option value=0>No</option>
    </select>

    <button class="btn btn-primary mt-3">Salva</button>
</form>
@endsection


