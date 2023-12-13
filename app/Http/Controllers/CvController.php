<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Employe;
use HepplerDotNet\FlashToastr\Flash;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employe::all();

        return view('pages.CV.liste', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Flash::info('CV','archivé avec succès');
        return view('pages.CV.importe');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validation des données reçues
        $validatedData = $request->validate([
            'matricule' => 'required|string',
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'sexe' => 'required|in:M,F',
            'service' => 'required|string',
            'cadre' => 'required|string',
            'localite' => 'required|string',
            'fichier' => 'required|file',
        ]);

//        dd($request->all(),$request->hasFile('fichier'));
        // Traitement des données (par exemple, enregistrer dans la base de données)
        // Ici, vous pourriez créer une nouvelle instance de votre modèle et sauvegarder les données

        $employee = new Employe();
        $employee->matricule = $validatedData['matricule'];
        $employee->first_name = $validatedData['prenom'];
        $employee->last_name = $validatedData['nom'];
        $employee->sexe = $validatedData['sexe'];
        $employee->service = strtoupper($validatedData['service']);
        $employee->cadre = $validatedData['cadre'];
        $employee->localite = $validatedData['localite'];

        if ($employee->save()) {
            if ($request->hasFile('fichier')) {
                // Stocker le fichier dans le système de fichiers
                $path = $request->file('fichier')->store('dossier', 'public');
                $cv = new Cv();
                $cv->id_employee = $employee->employee_id;
                $cv->path = $path;
                $cv->save();
                Flash::info('CV', 'archivé avec succès');
                // Vous pouvez enregistrer $path dans votre base de données si nécessaire
            }
        } else {
        }


        // Redirection ou autre logique post-enregistrement
        return redirect()->route('cv-import');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id); // Assurez-vous que le modèle Employee est correctement utilisé

        $employee->update([
            'matricule' => $request->input('matricule'),
            'first_name' => $request->input('prenom'),
            'last_name' => $request->input('nom'),
            'sexe' => $request->input('sexe'),
            'service' => $request->input('service'),
            'cadre' => $request->input('cadre'),
            'localite' => $request->input('localite'),
            // Ajoutez d'autres champs si nécessaire
        ]);
        if ($employee->save()) {
            if ($request->hasFile('fichier')) {
                // Stocker le fichier dans le système de fichiers
                $path = $request->file('fichier')->store('dossier', 'public');
                $cv = new Cv();
                $cv->id_employee = $employee->employee_id;
                $cv->path = $path;
                $cv->save();
                Flash::info('Employé', 'mise à jour effectuée avec succès');
                // Vous pouvez enregistrer $path dans votre base de données si nécessaire
            }
        } else {
        }
        // Vous pouvez ajouter d'autres actions ou rediriger selon vos besoins
        return redirect()->route('cv-import-update', $employee->id)->with('success', 'Employé mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
