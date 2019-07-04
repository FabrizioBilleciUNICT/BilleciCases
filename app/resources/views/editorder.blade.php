@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="/dashboard" class="nav-back">&#8617; DASHBOARD</a></p>
        <div class="card">
            <div class="card-header">Edit Order</div>
            <div class="card-body">
                <form method="post" action="{{action('OrderController@edit', $preventive->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="Carcompany">Model ID:</label>
                            <input type="text" class="form-control" name="model_id" value="{{$preventive->model_id}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="Model">Color:</label>
                            <input type="text" class="form-control" name="color" value="{{$preventive->color}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="Price">Measures:</label>
                            <input type="text" class="form-control" name="measures" value="{{$preventive->measures}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
