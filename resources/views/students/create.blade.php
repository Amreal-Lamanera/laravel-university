{{-- form di creazione --}}
@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <h2>
                Inserisco un nuovo studente
            </h2>
        </div>

        <div class="container">
            <form action=" {{ route('students.store') }} " method="POST">
                @csrf
                <p>
                    <label for="name">
                        Nome
                    </label>
                    <input
                        type="text"
                        style="@error('name') border-color: red; @enderror"
                        name="name"
                        id="name"
                        placeholder="Nome studente"
                        {{-- posso usare l'helper old per ricordarmi il valore inserito in caso di errore, che mi rimanda alla pagina, così da non perderlo --}}
                        value="{{ old('name') }}"
                    >
                    {{-- SE voglio un errore singolo --}}
                    @error('name')
                        <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </p>

                <p>
                    <label for="surname">
                        Cognome
                    </label>
                    <input
                        type="text"
                        name="surname"
                        id="surname"
                        placeholder="Cognome studente"
                        value="{{ old('surname') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('surname')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <label for="date_of_birth">
                        Data di nascita
                    </label>
                    <input
                        type="date"
                        name="date_of_birth"
                        id="date_of_birth"
                        placeholder="Data di nascita studente"
                        value="{{ old('date_of_birth') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('date_of_birth')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <label for="address">
                        CF
                    </label>
                    <input
                        type="text"
                        name="fiscal_code"
                        id="fiscal_code"
                        placeholder="Codice fiscale studente"
                        value="{{ old('fiscal_code') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('fiscal_code')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <label for="enrolment_date">
                        Data iscrizione
                    </label>
                    <input
                        type="date"
                        name="enrolment_date"
                        id="enrolment_date"
                        placeholder="Data iscrizione"
                        value="{{ old('enrolment_date') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('enrolment_date')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <label for="email">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Email studente"
                        value="{{ old('email') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('email')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <input type="submit" value="Salva">
                </p>

            </form>
        </div>
    </section>

@endsection