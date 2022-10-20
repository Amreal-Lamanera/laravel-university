@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>
            {{ $department->name }}
        </h1>
        <h3>
            {{ $department->head_of_department}}
        </h3>
        <div>
            <ul>
                <li>
                    <span>Indirizzo:</span> {{ $department->address }}
                </li>
                <li>
                    <span>Email:</span> {{ $department->email }}
                </li>
                <li>
                    <span>Telefono:</span> {{ $department->phone }}
                </li>
                <li>
                    <span>Sito Web:</span> {{ $department->website }}
                </li>
            </ul>

            <div class="container">
                <a href=" {{ route('admin.departments.edit', $department) }} ">Modifica dipartimento</a>

                {{-- per fare una delete serve un form in cui specificare il metodo DELETE, altrimenti finirei nella pagina show --}}
                <form action="{{ route('admin.departments.destroy', $department) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Elimina">
                </form>

            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <h2>
                Elenco dei corsi di laurea
            </h2>
        </div>
    </section>

@endsection