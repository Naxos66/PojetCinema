@extends('template')
@section('css')
<style>
    .card-footer {
        justify-content: center;
        align-items: center;
        padding: 0.4em;
    }
    .is-info {
        margin: 0.3em;
    }
</style>
@endsection
@section('content')
@if(session()->has('info'))
<div class="notification is-success">
    {{ session('info') }}
</div>
@endif
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Cinéma</p>
        <a class="button is-info" href="{{ route('cinemas.create') }}">Créer un cinéma</a>
    </header>
    <div class="card-content">
        <div class="content">
            <table class="table is-hoverable">
                <thead>
                <tr>
                    <th>Titre</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cinemas as $cinema)
                <tr @if($cinema->deleted_at) class="has-background-grey-lighter" @endif>
                    <td><strong>{{ $cinema->name }}</strong></td>
                    <td>
                        @if($cinema->deleted_at)
                        <form action="#" method="post">
                            @csrf
                            @method('PUT')
                            <button class="button is-primary" type="submit">Restaurer</button>
                        </form>
                        @else
                        <a class="button is-primary" href="#">Voir</a>
                        @endif
                    </td>
                    <td>
                        @if($cinema->deleted_at)
                        @else
                        <a class="button is-warning" href="#">Modifier</a>
                        @endif
                    </td>
                    <td>
                        <form action="#" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="button is-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <footer class="card-footer is-centered">
        {{ $cinemas->links() }}
    </footer>
</div>
@endsection
