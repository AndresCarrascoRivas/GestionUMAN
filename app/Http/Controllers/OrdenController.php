<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Mail\OrderCreatedMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class OrdenController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $equiposUb = DB::table('equipo_ubs')->select('serialUb')->get();
        return view('orders.create', compact('equiposUb'));
    }

    public function store(StoreOrderRequest $request)
    {
        Order::create($request->validated());

        //Mail::to('prueba@prueba.com')->send(new OrderCreatedMail);

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
        $order->fill($request->validated());
        $order->save();

        return redirect()->route('ordenes.show', $order->id);

    }
}
