<?php

namespace App\Http\Controllers;

use App\FlightCaseComponent;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    protected function getAllComponents(){
        $components_ = FlightCaseComponent::all();
        $components = [];
        foreach ($components_ as $c) $components[$c->name] = $c->price;

        return $components;
    }

    public function newOrder() {
        $components = $this->getAllComponents();
        return view('neworder', compact('components'));
    }

    public function store(Request $request) {
        $colorsName = ["Black","Red", "Blue", "Yellow"];
        $typesName = ["Custom","Piano", "Pizza", "Telescope", "Cables"];

        $order = new Order();
        $order->type = $typesName[$request->get('type')+1];
        $order->measures = $request->get('measures');
        $order->color = $colorsName[$request->get('color')];
        $order->shaped = $request->get('shaped')? "Yes":"No";
        $order->handles = $request->get('handles');
        $order->price = $request->get('price');
        $order->name = Auth::user()->name;
        $order->email = Auth::user()->email;
        $order->status = 0;

        $order->save();
        return redirect('dashboard')->with('success', 'Order has been successfully added');
    }

    public function edit($id) {
        $components = $this->getAllComponents();
        $order = Order::find($id);

        return view('editorder',compact('order','id'), compact('components'));
    }

    public function update(Request $request, $id) {
        $colorsName = ["Black","Red", "Blue", "Yellow"];

        $order = Order::find($id);

        $order->measures = $request->get('measures');
        $order->color = $colorsName[$request->get('color')];
        $order->price = $request->get('price');

        $order->save();
        return redirect('dashboard')->with('success', 'Order has been successfully update');
    }

    public function delete($id) {
        $order = Order::find($id);

        $order->delete();
        return redirect('dashboard')->with('success','Order has been deleted');
    }

}
