@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="/dashboard" class="nav-back">&#8617; DASHBOARD</a></p>
        <div class="card">
            <div class="card-header" style="overflow: hidden">Prices</div>
            <div class="card-body">
                <div style="overflow:hidden;">
                    <a href="/createComponents" style="color: black; float:right; font-size: 10px">&#8617; RESTORE DEFAULT PRICES</a>
                </div>

                <form method="post" action="{{url('updatePrices')}}" style="font-size: 14px">
                    @csrf
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="handle">Handle
                                <input type="text" class="form-control" name="handle" value="{{$components['handle']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="surface">Surface Material
                                <input type="text" class="form-control" name="surface" value="{{$components['surface']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="surface">Black Surface
                                <input type="text" class="form-control" name="surface_black" value="{{$components['surface_black']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="surface">Blue Surface
                                <input type="text" class="form-control" name="surface_blue" value="{{$components['surface_blue']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="surface">Red Surface
                                <input type="text" class="form-control" name="surface_red" value="{{$components['surface_red']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="surface">Yellow Surface
                                <input type="text" class="form-control" name="surface_yellow" value="{{$components['surface_yellow']}}">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="noShape">No-shaped
                                <input type="text" class="form-control" name="noShape" value="{{$components['noShape']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="shape">Shaped
                                <input type="text" class="form-control" name="shape" value="{{$components['shape']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn-standard">Update prices</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

