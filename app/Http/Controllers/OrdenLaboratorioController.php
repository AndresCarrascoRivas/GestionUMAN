<?php

namespace App\Http\Controllers;

use App\Models\OrdenLaboratorio;
use Illuminate\Http\Request;

class OrdenLaboratorioController extends Controller
{
    public function index()
    {
        $ordenLaboratorio = OrdenLaboratorio::orderBy('id', 'desc')->paginate(10);
        return view('ordenlaboratorio.index', compact('ordenLaboratorio'));
    }
}
