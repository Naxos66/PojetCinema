@extends('template')
@section('content')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'un cinéma</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('cinemas.store', $cinema->id) }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">Titre</label>
                    <div class="control">
                        <input class="input @error('title') is-danger @enderror" type="text" name="name" value="{{ old('name', $cinema->name) }}" placeholder="Nom du cinéma">
                    </div>
                    @error('name')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Adresse</label>
                    <div class="control">
                        <input class="input @error('address') is-danger @enderror" type="text" name="address" value="{{ old('address', $cinema->address) }}" placeholder="Adresse">
                    </div>
                    @error('address')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Ville</label>
                    <div class="control">
                        <input class="input @error('city') is-danger @enderror" type="text" name="city" value="{{ old('city', $cinema->city) }}" placeholder="Ville">
                    </div>
                    @error('city')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Code Postal</label>
                    <div class="control">
                        <input class="input @error('zipcode') is-danger @enderror" type="text" name="zipcode" value="{{ old('zipcode', $cinema->zipcode) }}" placeholder="Code Postal">
                    </div>
                    @error('zipcode')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Téléphone</label>
                    <div class="control">
                        <input class="input @error('phone') is-danger @enderror" type="text" name="phone" value="{{ old('phone', $cinema->phone) }}" placeholder="Téléphone">
                    </div>
                    @error('phone')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input @error('email') is-danger @enderror" type="text" name="email" value="{{ old('email', $cinema->email) }}" placeholder="Email">
                    </div>
                    @error('email')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
