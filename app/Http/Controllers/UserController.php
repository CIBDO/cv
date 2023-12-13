<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('pages.Users.liste');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        /* return view('pages.Users.create'); */
    }
    public function ajouterUtilisateur()
    {
        // Création d'un nouvel utilisateur
        $nouvelUtilisateur = new User;

        // Remplissage des données de l'utilisateur
        $nouvelUtilisateur->name = 'admin';
        $nouvelUtilisateur->email = 'mali.dntcp@gmail.com';
        $nouvelUtilisateur->password = bcrypt('reforme@2024'); // Utilisation de la fonction bcrypt

        // Sauvegarde de l'utilisateur dans la base de données
        $nouvelUtilisateur->save();

        return 'Utilisateur ajouté avec succès!';
    }
}
  