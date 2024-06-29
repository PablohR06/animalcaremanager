<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Albergue;
use App\Models\Animal;
use App\Models\Adopcion;
use App\Models\Insumo;
use App\Models\Donacion;

class StatisticsController extends Controller
{
    public function index()
    {
        $data = [
            'total_users' => User::count(),
            'total_albergues' => Albergue::count(),
            'total_animals' => Animal::count(),
            'total_adoptions' => Adopcion::count(),
            'total_insumos' => Insumo::count(),
            'total_donations' => Donacion::sum('monto'),
        ];

        return view('statistics.index', compact('data'));
    }
}
