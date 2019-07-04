@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="/dashboard" class="nav-back">&#8617; DASHBOARD</a></p>
        <div class="card">
            <div class="card-header">Edit Order</div>
            <div class="card-body">
                <form id="formeditorder" method="post" action="{{action('OrderController@edit', $order->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="color">Color</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="Price">Measures</label>
                            <input type="text" class="form-control" name="measures" value="{{$order->measures}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <button type="button" id="editorder" class="btn-standard">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/order.js') }}"></script>
@endsection
