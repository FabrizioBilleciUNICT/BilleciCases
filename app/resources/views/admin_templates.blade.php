<script>
    var templates = {!! json_encode($templates, JSON_HEX_TAG) !!};
</script>
@extends('layouts.admin_app')

@section('content')
<div class="container-admin">
    <div class="cardx-top">
        <div class="cardx-dark">
            <div class="card-body">
                <p class="p-dashboard-header">Templates</p>

                <p id="show-templates"></p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/templates.js') }}"></script>
<script>
    $(document).ready(function() {
        $($('#mySidenav a')[3]).addClass('color-accent');
    });
</script>
@endsection

