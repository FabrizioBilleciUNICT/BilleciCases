<?php

namespace App\Http\Controllers;

use App\Preventive;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request) {
        $preventive = new Preventive();
        $preventive->model_id = $request->get('model_id');
        $preventive->color = $request->get('color');
        $preventive->measures = $request->get('measures');
        $preventive->name = Auth::user()->name;
        $preventive->email = Auth::user()->email;
        $preventive->status = 0;
        $preventive->save();
        return redirect('dashboard')->with('success', 'Preventive has been successfully added');
    }

    public function edit($id) {
        $preventive = Preventive::find($id);

        return view('editorder',compact('preventive','id'));
    }

    public function update(Request $request, $id) {
        $preventive = Preventive::find($id);

        $preventive->model_id = $request->get('model_id');
        $preventive->color = $request->get('color');
        $preventive->measures = $request->get('measures');
        $preventive->save();
        return redirect('dashboard')->with('success', 'Preventive has been successfully update');
    }

    public function delete($id) {
        $preventive = Preventive::find($id);

        $preventive->delete();
        return redirect('dashboard')->with('success','Preventive has been deleted');
    }



}
