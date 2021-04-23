@if(Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @switch(Session::get('alert-class', 'alert-info'))
            @case('alert-success')
                    <i class="icon fas fa-check"></i>
                    @break
            @case('alert-danger')
                    <i class="icon fas fa-ban"></i>
                    @break
            @case('alert-warning')
                    <i class="icon fas fa-exclamation-triangle"></i>
                    @break
            @case('alert-info')
                    <i class="icon fas fa-info"></i>
                    @break
            @default
        @endswitch
        {{ Session::get('message') }}
    </div>
@endif