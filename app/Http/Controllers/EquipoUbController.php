<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipoUbRequest;
use App\Models\EquipoUb;
use Illuminate\Http\Request;

class EquipoUbController extends Controller
{
    
    public function index()
    {
        $equiposUb = EquipoUb::orderBy('created_at', 'desc')->paginate(10);
        return view('equiposUb.index', compact('equiposUb'));
    }

    
    public function create()
    {
        return view('equiposUb.create');
    }

    public function store(StoreEquipoUbRequest $request)
    {
        EquipoUb::create($request->all());
        return redirect('/equiposUb');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

}
