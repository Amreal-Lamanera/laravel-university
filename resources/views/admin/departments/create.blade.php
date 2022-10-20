{{-- form di creazione --}}
@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <h2>
                Crea un nuovo dipartimento
            </h2>
        </div>

        <div class="container">
            <form action=" {{ route('admin.departments.store') }} " method="POST">
                @csrf
                {{--
                    csrf è un tipo di attacco che potrebbe subire l'applicativo: cross-site request forgery.
                    Questo comando aggiunge una sorta di token che verifica automaticamente la sessione di chi naviga.
                    Quindi viene inserito nel form un campo nascosto che contiene questo token e quando inviamo il form, laravel riceve questa richiesta con anche il token e controlla che sia di un utente che sta visitando il sito web, se così non fosse blocca la pagina.
                --}}

                <p>
                    <label for="name">
                        Nome
                    </label>
                    <input
                        type="text"
                        style="@error('name') border-color: red; @enderror"
                        name="name"
                        id="name"
                        placeholder="Nome del dipartimento"
                        {{-- posso usare l'helper old per ricordarmi il valore inserito in caso di errore, che mi rimanda alla pagina, così da non perderlo --}}
                        value="{{ old('name') }}"
                    >
                    {{-- SE voglio un errore singolo --}}
                    @error('name')
                        <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </p>

                <p>
                    <label for="head-of-department">
                        Capo dipartimento
                    </label>
                    <input
                        type="text"
                        name="head_of_department"
                        id="head-of-department"
                        placeholder="Nome capo dipartimento"
                        value="{{ old('head_of_department') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('head-of-department')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <label for="email">
                        Email
                    </label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        placeholder="Email del dipartimento"
                        value="{{ old('email') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('email')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <label for="address">
                        Indirizzo
                    </label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        placeholder="Indirizzo del dipartimento"
                        value="{{ old('address') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('address')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <label for="phone">
                        Numero di telefono
                    </label>
                    <input
                        type="tel"
                        name="phone"
                        id="phone"
                        placeholder="Numero di telefono"
                        value="{{ old('phone') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('phone')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <label for="website">
                        Sito web
                    </label>
                    <input
                        type="text"
                        name="website"
                        id="website"
                        placeholder="Sito del dipartimento"
                        value="{{ old('website') }}"
                    >
                </p>
                {{-- SE voglio un errore singolo --}}
                @error('website')
                    <div style="color: red; font-size:12px;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <p>
                    <input type="submit" value="Salva">
                </p>

            </form>
        </div>
    </section>

@endsection