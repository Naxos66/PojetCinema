@extends('layouts.app')

@section ('page_title',"Liste des Cinemas")

@section('content')
<h1>{{$Cinemas->name}}</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('cinema.update', cinema->id)}}" method="POST">
    @csrf

    <select name="animal_id" class="@error('animal_id') is-invalid @enderror">
        @foreach($animals as $animal)
        <option value="{{$animal->id}}">
            {{$animal->name}}
        </option>
        @endforeach
    </select>
    @error('animal_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="submit" value="Enregister">
</form>

<section>
    <h2>Tous les animaux</h2>
    @foreach($enclosures->animals as $animal)
    {{$animal->name}}</section><br>
@endforeach

</section>


@endsection
