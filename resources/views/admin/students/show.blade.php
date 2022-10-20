@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>
            {{ $student->name }} {{ $student->surname }}
        </h1>
        <h3>
            {{ $student->registration_number}}
        </h3>
        <div>
            <ul>
                <li>
                    <span>CF:</span> {{ $student->fiscal_code }}
                </li>
                <li>
                    <span>Email:</span> {{ $student->email }}
                </li>
                <li>
                    <span>Nato il:</span> {{ $student->date_of_birth }}
                </li>
                <li>
                    <span>Iscritto dal:</span> {{ $student->enrolment_date }}
                </li>
            </ul>

            <div class="container">
                <a href=" {{ route('admin.students.edit', $student) }} ">Modifica dati studente</a>

                {{-- per fare una delete serve un form in cui specificare il metodo DELETE, altrimenti finirei nella pagina show --}}
                <form action="{{ route('admin.students.destroy', $student) }}" method="POST">
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