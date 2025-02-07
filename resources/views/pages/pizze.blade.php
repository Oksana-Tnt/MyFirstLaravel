@extends('layout.layout')

@section('title', 'Menu')

@section('content')
    <h1>Lista pizze</h1>
<form action="{{route('pizze')}}" class="form d-flex mb-2">
    <select name="gusto" id="" class="form-select">
        @foreach($gusti as $gusto)
            <option value="{{$gusto}}">{{$gusto}}</option>
        @endforeach
    </select>
    <button class="btn btn-info">Cerca</button>
</form>
<div class="mb-2">
<a href="{{route('pizze')}}" class="btn btn-info">Elimina Filtri</a>
<a href="{{route('pizze', ['gusto' => 'Caprese'])}}" class="btn btn-info">Caprese</a>
</div>
    <table class=table>
        <tr>
            <th>Gusto</th>
            <th>Prezzo</th>
            <th>Available</th>
            <th colspan="3" class="text-center">Actions</th>
        </tr>
    @foreach ($pizzas as $pizza)
        <tr>
        <td>{{$pizza['gusto']}}</td>
        <td>{{$pizza['prezzo']}}</td>
        <td>{{$pizza['available']}}</td>
        <td class="text-center">
            <a href="{{route('details', $pizza->id)}} " class="btn btn-primary">Info</a>
        </td>
        <td class="text-center">
            <form action="{{route('destroy', $pizza->id)}}" method="post">
                @csrf
                @method('DELETE')
            <button class="btn btn-danger">Delete</button>
            </form>
        </td>
        <td class="text-center">
            <a href="{{route('edit', $pizza->id)}}" class="btn btn-warning">Update</a>
        </td>
        </tr>
    @endforeach
</table>
@endsection
