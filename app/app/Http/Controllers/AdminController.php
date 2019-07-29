<?php

namespace App\Http\Controllers;

use App\FlightCaseComponent;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;

class AdminController extends Controller
{

    public function prices() {
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com') { //superuser
            $components_ = FlightCaseComponent::all();

            $components = [];
            foreach ($components_ as $c){
                $components[$c->name] = $c->price;
            }

            return view('prices', compact('components'));
        }

        return view('welcome');
    }


    protected function createComponent(string $name, string $price){
        $component = new FlightCaseComponent();

        $component->name = $name;
        $component->price = $price;

        return $component;
    }

    public function createComponents(){
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com') {
            $components = FlightCaseComponent::all();
            if(count($components) > 0) FlightCaseComponent::truncate();

            $this->createComponent('surface', '0.01')->save();
            $this->createComponent('surface_black', '0.01')->save();
            $this->createComponent('surface_blue', '0.03')->save();
            $this->createComponent('surface_red', '0.02')->save();
            $this->createComponent('surface_yellow', '0.03')->save();
            $this->createComponent('handle', '30')->save();
            $this->createComponent('shape', '60')->save();
            $this->createComponent('noShape', '20')->save();

            return redirect('prices');
        }

        return redirect('welcome');
    }

    public function updateComponent(string $name, Request $request){
        $component = new FlightCaseComponent();

        $component->name = $name;
        $component->price = $request->get($name);

        return $component;
    }

    public function updatePrices(Request $request) {
        $this->updateComponent('surface', $request)->save();
        $this->updateComponent('surface_black', $request)->save();
        $this->updateComponent('surface_blue', $request)->save();
        $this->updateComponent('surface_red', $request)->save();
        $this->updateComponent('surface_yellow', $request)->save();
        $this->updateComponent('handle', $request)->save();
        $this->updateComponent('shape', $request)->save();
        $this->updateComponent('noShape', $request)->save();

        return redirect('prices');
    }



}
