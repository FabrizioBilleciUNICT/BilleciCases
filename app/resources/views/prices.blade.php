@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="/dashboard" class="nav-back">&#8617; DASHBOARD</a></p>
        <div class="card">
            <div class="card-header">Prices</div>
            <div class="card-body">
                <form method="post" action="{{url('updatePrices')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="handle">Handle Price
                                <input type="text" class="form-control" name="handle" value="{{$components['handle']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="surface">Surface Price
                                <input type="text" class="form-control" name="surface" value="{{$components['surface']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="noShape">No-shaped Price
                                <input type="text" class="form-control" name="noShape" value="{{$components['noShape']}}">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="shape">Shaped Price
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

