<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Employe;
use App\Models\User;
use HepplerDotNet\FlashToastr\Flash;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        User::create([
            'name' => 'admin',
            'email' => 'mali.dntcp@gmail.com',
            password_hash( "password",'dntcp@2023')

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employe::find($id);
        $employee->cv = $employee->cv->first();
        return view('pages.employee.details', compact('employee'));
    }
    public function edit(string $id)
    {
        /* $employee = Employe::find($id);
        return view('pages.employee.edit', compact('employee')); */
        $employee = Employe::find($id);
        return view('pages.employee.edit', compact('employee'));
    }
    public function update(Request $request, string $id)
    {
//        dd($request->all());
        // Validation des données du formulaire
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'matricule' => 'required|string|max:255',
            'cadre' =>'required|string|max:255',
            'localite' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'cv' => 'file|mimes:pdf|', // Assurez-vous que le fichier est un fichier PDF et ne dépasse pas 2 Mo.
        ]);

        $employee = Employe::find($id);
        $employee->first_name = $request->input('prenom');
        $employee->last_name = $request->input('nom');
        $employee->matricule = $request->input('matricule');
        $employee->cadre = $request->input('cadre');
        $employee->localite = $request->input('localite');
        $employee->sexe = $request->input('sexe');
        $employee->service = $request->input('service');


        // Gestion du fichier CV
        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('dossier', 'public');
            $cv = Cv::where('id_employee', $employee->employee_id)->first();
            $cv->path = $path;
            $cv->save();
        }

        $employee->save();
        Flash::info('Employé', 'modifié avec succès');

        return redirect()->route('cv-list')->with('success', 'Employé modifié ');
    }
    public function destroy(string $id)
    {
        /* $employee = Employe::find($id);
        $employee->delete();
        return redirect()->route('cv-list')->with('success', 'Employé supprimé avec succès'); */
        $employee = Employe::find($id);

        if (!$employee) {
            return redirect()->route('cv-list')->with('error', 'Employé non trouvé');
        }
    
        $employee->delete();
        Flash::info('Employé', 'supprimé avec succès');
        return redirect()->route('cv-list')->with('success', 'Employé supprimé avec succès');
    }
    

    
}
