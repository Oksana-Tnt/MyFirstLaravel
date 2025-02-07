@extends('layout.layout')

@section('title', 'Modificare')

@section('content')
<h1>Modifica pizza : {{$pizza->gusto}} </h1>

<form action="{{route('update', $pizza->id)}} " method="post">
    @csrf
    @method("PUT")
    <label for="gusto">Gusto</label>
    <input type="text" id="gusto" value="{{$pizza->gusto}}" name="gusto" class="form-control">

    <label for="prezzo">Prezzo</label>
    <input type="number" id="prezzo" value="{{$pizza->prezzo}}" name="prezzo" class="form-control">

    <label for="available">Disponibilita</label>
    <select name="available" id="available" class="form-control">
        <option {{$pizza->available === 1 ? 'selected' : ''}} value=1>Si</option>
        <option {{$pizza->available === 0 ? 'selected' : ''}} value=0>No</option>
    </select>

    <button class="btn btn-primary mt-3">Salva</button>
</form>
@endsection
