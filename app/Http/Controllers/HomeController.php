<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cv;
use App\Models\Employe;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $totalemployes = Employe::count();
    $employeHommeCount = Employe::where('sexe', 'M')->count();
    $employeFemmeCount = Employe::where('sexe', 'F')->count();

    $employeParCorps = Employe::select('localite', DB::raw('count(*) as count'))
        ->groupBy('localite')
        ->get(); 
        $employeParCorpsTresor = Employe::where('cadre', 'trésor')->count();
    $dashCounts = [
        ['class' => 'total-employes', 'label' => 'Total des Employes', 'icon' => 'user', 'value' => $totalemployes],
        ['class' => 'employe-homme', 'label' => 'Employes Homme', 'icon' => 'user-check', 'value' => $employeHommeCount],
        ['class' => 'employe-femme', 'label' => 'Employes Femme', 'icon' => 'user-female', 'value' => $employeFemmeCount],
        ['class' => 'corps-tresor', 'label' => 'Corps Tresor', 'icon' => 'user-tie', 'value' => $employeParCorpsTresor],

        // Ajoutez d'autres compteurs selon vos besoins
    ];

    return view('pages.home.index', compact('dashCounts', 'employeHommeCount', 'employeFemmeCount', 'totalemployes', 'employeParCorpsTresor'));
}
}