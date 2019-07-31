<script>
    var templates = {!! json_encode($templates, JSON_HEX_TAG) !!};
</script>
@extends('layouts.admin_app')

@section('content')
<div class="container-admin">
    <div class="cardx-top" id="card-templates">
    </div>
    <div class="cardx-dark">
        <div class="card-body">
            <div style="overflow:hidden;">
                <a href="/createTemplates" style="float:right; font-size: 10px">&#8617; RESTORE DEFAULT TEMPLATES</a>
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

