<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(StoreOrderRequest $request)
    {
        Order::create($request->all());
        return redirect('/ordenes');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->serialUb = $request->serialUb;
        $order->serialTms = $request->serialTms;
        $order->serialUps = $request->serialUps;
        $order->versionRpi = $request->versionRpi;
        $order->versionFirmware = $request->versionFirmware;
        $order->tecnico = $request->tecnico;
        $order->faena = $request->faena;
        $order->falla = $request->falla;
        $order->descripcionFalla = $request->descripcionFalla;
        $order->DetalleReparacion = $request->DetalleReparacion;
        $order->fechaIngreso = $request->fechaIngreso;
        $order->fechaReparacion = $request->fechaReparacion;
        $order->hReparacion = $request->hReparacion;

        $order->save();

        return redirect("/ordenes/{$order->id}");
    }
}
