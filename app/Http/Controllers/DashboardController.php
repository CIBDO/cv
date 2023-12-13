<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Logique pour récupérer les données du tableau de bord
        $data = [
            'totalUsers' => User::count(),
            'latestOrders' => Order::latest()->take(5)->get(),
            // Ajoutez d'autres données selon vos besoins
        ];

        return view('dashboard.index', compact('data'));
    }
}
