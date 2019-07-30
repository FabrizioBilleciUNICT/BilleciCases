<script>
    var components = {!! json_encode($components, JSON_HEX_TAG) !!};
    var order = {!! json_encode($order => toArray(), JSON_HEX_TAG) !!};
</script>
@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="/dashboard" class="nav-back">&#8617; DASHBOARD</a></p>
        <div class="card">
            <div class="card-header">Edit Order</div>
            <div class="card-body">
                <div class="stage-container">
                    <div id="stage"></div>
                </div>
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
                            <input type="text" class="form-control" name="measures" value="{{$order->measures}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="handles">Handles</label>
                            <select class="form-control" name="handles" disabled>
                                <option value="1" @if($order->handles == "1") selected @endif>1</option>
                                <option value="2" @if($order->handles == "2") selected @endif>2</option>
                                <option value="3" @if($order->handles == "3") selected @endif>3</option>
                                <option value="4" @if($order->handles == "4") selected @endif>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="price">Price
                                <input type="text" class="form-control" name="price" value="{{$order->price}}" readonly>
                            </label>
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
    <script src="{{ asset('js/cases.js') }}"></script>
    <script src="{{ asset('js/Sprite3D.js') }}"></script>
    <script src="{{ asset('js/order.js') }}"></script>
    <script>//createCase();</script>
@endsection
