@if(!is_null(session('status')))
<div class="alert alert-{{$type}} d-flex p-4 rounded-3" role="alert">
    <i class="fa fa-check-circle  me-3 align-self-center"></i>
    <div class="mb-0 align-self-center">{!! $message !!}</div>
    <button type="button" class="btn-close btn-sm ms-auto align-self-center" data-bs-dismiss="alert" aria-label="Close">X</button>
  </div>
@endif
@if(request()->ajax())
<div class="alert alert-success d-flex p-4 rounded-3" role="alert">
    <i class="fa fa-check-circle  me-3 align-self-center"></i>
    <div class="mb-0 align-self-center message">lol</div>
    <button type="button" class="btn-close btn-sm ms-auto align-self-center" data-bs-dismiss="alert" aria-label="Close">X</button>
  </div>
@endif


