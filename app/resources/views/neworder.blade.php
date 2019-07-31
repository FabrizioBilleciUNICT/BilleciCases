<script>
    var components = {!! json_encode($components, JSON_HEX_TAG) !!};
    var templates = {!! json_encode($templates, JSON_HEX_TAG) !!};
    var order_states = {!! json_encode($states, JSON_HEX_TAG) !!};
</script>
@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="/dashboard" class="nav-back">&#8617; DASHBOARD</a></p>
        <div class="card">
            <div class="card-header">New Order</div>
            <div class="card-body">
                <div class="stage-container">
                    <div id="stage"></div>
                </div>
                <form method="post" action="{{url('addorder')}}" id="formorder">
                    <p style="text-align: center; margin-bottom: -10px; font-weight: 600">Type</p>
                    <table id="table-templates"></table>

                    @csrf
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="measures">Measures
                                <input type="text" class="form-control" name="measures">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="color">Color</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4 toggle">
                            <input id="tog" type="checkbox" class="form-control" name="shaped" checked>
                            <label for="tog">Shaped</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="handles">Handles</label>
                            <select class="form-control" name="handles">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="price">Price
                                <input type="text" class="form-control" name="price" readonly>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <button type="button" id="makeorder" class="btn-standard">Make Order</button>
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

