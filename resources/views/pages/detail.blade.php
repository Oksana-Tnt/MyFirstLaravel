@extends('layout.layout')

@section('title', 'Details Pizza: {{$pizza->gusto}}')


@section('content')
<h1>Pizza {{$pizza->gusto}}</h1>

<p>Prezzo: {{$pizza->prezzo}}€</p>

<p>{{$pizza->active ? 'La pizza è disponibile' : 'La pizza non è disponibile'}}</p>

<a href="{{route('pizze')}}" class="btn btn-primary">Home</a>
@endsection
