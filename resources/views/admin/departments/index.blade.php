@extends('layouts.app')

@section('content')

    <section>
        <div class="container" style="display:flex; justify-content: flex-end">
            <a href=" {{ route('admin.departments.create') }} ">
                Aggiungi dipartimento
            </a>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <table>
                    <thead>
                        <th>
                            ID
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Indirizzo
                        </th>
                        <th>
                            Numero
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Sito Web
                        </th>
                        <th>
                            Capo Dipartimento
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($departments as $d)
                            <tr>
                                <td>
                                    {{$d->id}}
                                </td>
                                <td>
                                    {{$d->name}}
                                </td>
                                <td>
                                    {{$d->address}}
                                </td>
                                <td>
                                    {{$d->phone}}
                                </td>
                                <td>
                                    {{$d->email}}
                                </td>
                                <td>
                                    {{$d->website}}
                                </td>
                                <td>
                                    {{$d->head_of_department}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.departments.show',$d)}}">
                                        Visualizza
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.departments.edit', $d) }}">Modifica</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.departments.destroy', $d) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                    
                                        <input type="submit" value="Elimina">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection