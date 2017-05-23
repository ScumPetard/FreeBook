@if(Session::has('notify_message'))
    <div class="alert alert-{{  session('notify_type') }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{  session('notify_message') }}
    </div>
@endif