<?php

// creato con: php artisan make:controller DepartmentController -r
// laravel con il comando -r ci scrive in automatico tutti i metodi del crud

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        // dd($departments);
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // commento per validazione
        // $params = $request->all();

        // $d = new Department();
        // $d->name = $params['name'];
        // $d->address = $params['address'];
        // $d->phone = $params['phone'];
        // $d->email = $params['email'];
        // $d->website = $params['website'];
        // $d->head_of_department = $params['head_of_department'];
        // $d->save();
        // oppure
        // $d = new Department();
        // $d->fill($params);
        // per fare questo devo definire una variabile protected $fillable al model, con l'elenco dei campi coi quali vogliamo gestire questo assegnamentod di massa
        // $d->save();


        // validare i dati che arrivano nella request
        // metodo validate() della classe request a cui possiamo passare un array con le validazioni da effettuare.
        // La chiave è il name dell'input, il value dell'array sono le regole di validazione da rispettare. Le varie regole di validazione sono separate dal pipe |.
        $params = $request->validate([
            'name' => 'required|max:255',
            // sintassi alternativa - essenziale per validazione custom
            'address' => ['required', 'max:255'],
            'email' => 'required|max:255|email',
            'website' => 'required|max:255|url',
            'head_of_department' => 'required|max:255',
            'phone' => 'nullable|max:255',
        ]);
        // se la validazione fallisce si viene automaticamente ricatapultati nella pagina precedente con degli errori che possono essere stampati.
        // lo inserisco in create.blade.php


        //queste 3 operazioni possono essere fatte anche in un unica riga:
        $d = Department::create($params);
        // DA NON CONFONDERE con il metodo create (non statico) presente sopra

        // a questo punto serve un redirect alla show che mostrerà la risorsa appena creata
        return redirect()->route('admin.departments.show', $d);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        // dd($id);
        // si può mettere direttamente l'istanza senza il find or fail, ma bisogna dare al parametro lo stesso nome che ha nella rotta
        // $department = Department::findOrFail($id);
        // dd($department);
        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        // $department = Department::findOrFail($id);
        // dd($department);
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        // $department = Department::findOrFail($id);
        $params = $request->validate([
            'name' => 'required|max:255',
            // sintassi alternativa - essenziale per validazione custom
            'address' => ['required', 'max:255'],
            'email' => 'required|max:255|email',
            'website' => 'required|max:255|url',
            'head_of_department' => 'required|max:255',
            'phone' => 'nullable|max:255',
        ]);
        $department->update($params);

        return redirect()->route('admin.departments.show', $department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        // dd($id);
        // $department = Department::findOrFail($id);
        $department->delete();
        // oppure:
        // Department::destroy($id);

        return redirect()->route('admin.departments.index');
    }
}
