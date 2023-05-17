@if(!empty(session('success'))){
    <div class='alert alert-success alert-dismissible fadein' role='alert'>
        {{ session('success') }}
    </div>
}
@endif
@if(!empty(session('error'))){
    <div class='alert alert-danger alert-dismissible fadein' role='alert'>
        {{ session('error') }}
    </div>
}
@endif
@if(!empty(session('payment-error'))){
    <div class='alert alert-error alert-dismissible fadein' role='alert'>
        {{ session('payment-error') }}
    </div>
}
@endif
@if(!empty(session('warning'))){
    <div class='alert alert-warning alert-dismissible fadein' role='alert'>
        {{ session('warning') }}
    </div>
}
@endif
@if(!empty(session('info'))){
    <div class='alert alert-info alert-dismissible fadein' role='alert'>
        {{ session('info') }}
    </div>
}
@endif
@if(!empty(session('secondary'))){
    <div class='alert alert-secondary alert-dismissible fadein' role='alert'>
        {{ session('secondary') }}
    </div>
}
@endif
@if(!empty(session('primary'))){
    <div class='alert alert-primary alert-dismissible fadein' role='alert'>
        {{ session('primary') }}
    </div>
}
@endif
@if(!empty(session('light'))){
    <div class='alert alert-light alert-dismissible fadein' role='alert'>
        {{ session('light') }}
    </div>
}
@endif