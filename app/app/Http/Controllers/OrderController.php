<?php

namespace App\Http\Controllers;

use App\FlightCaseComponent;
use App\FlightCaseTemplate;
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

    protected function getAllTemplates(){
        $templates_ = FlightCaseTemplate::all();

        $templates = [];
        foreach ($templates_ as $c){
            $templates[$c->name] = [
                'name' => $c->name,
                'color' => $c->color,
                'measures' => $c->measures,
                'shaped' => $c->shaped,
                'handles' => $c->handles
            ];
        }

        return $templates;
    }

    public function newOrder() {
        $components = $this->getAllComponents();
        $templates = $this->getAllTemplates();
        return view('neworder', compact('components'), compact('templates'));
    }

    public function store(Request $request) {
        $order = new Order();

        $order->type = $request->get('type');
        $order->measures = $request->get('measures');
        $order->color = $request->get('color');
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
        $templates = $this->getAllTemplates();
        $order = Order::find($id);

        return view('editorder',compact('order','id', 'components', 'templates'));
    }

    public function update(Request $request, $id) {
        $order = Order::find($id);
        $order->measures = $request->get('measures');
        $order->color = $request->get('color');
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
