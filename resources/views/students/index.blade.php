@extends('layouts.app')

@section('content')
    <section>
        <div class="container" style="display:flex; justify-content: flex-end">
            <a href=" {{ route('students.create') }} ">
                Aggiungi studente
            </a>
        </div>
    </section>

    <table>
        <thead>
            <th>
                ID
            </th>
            <th>
                Nome
            </th>
            <th>
                Cognome
            </th>
            <th>
                Data di Nascita
            </th>
            <th>
                Codice Fiscale
            </th>
            <th>
                Data Iscrizione
            </th>
            <th>
                Matricola
            </th>
            <th>
                Email
            </th>
        </thead>
        <tbody>
            @foreach ($students as $s)
                <tr>
                    <td>
                        {{$s->id}}
                    </td>
                    <td>
                        {{$s->name}}
                    </td>
                    <td>
                        {{$s->surname}}
                    </td>
                    <td>
                        {{$s->date_of_birth}}
                    </td>
                    <td>
                        {{$s->fiscal_code}}
                    </td>
                    <td>
                        {{$s->enrolment_date}}
                    </td>
                    <td>
                        {{$s->registration_number}}
                    </td>
                    <td>
                        {{$s->email}}
                    </td>
                    <td>
                        <a href="{{ route('students.show', $s)}}">
                            Visualizza
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('students.edit', $s) }}">Modifica</a>
                    </td>
                    <td>
                        <form action="{{ route('students.destroy', $s) }}" method="POST">
                            @csrf
                            @method('DELETE')
        
                            <input type="submit" value="Elimina">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection