@if(count($errors)>0)

@foreach($errors->all() as $error)
    <div class="alert alert-info">
        {{$error}}
    </div>
@endforeach

@endif

@if(session('success'))

    <div class="alert alert-success text-center">
       <h5> {!!session('success')!!} </h5>
    </div>

@elseif(session('success'))

<div class="alert alert-danger text-center">
        <h5>   {{session('error')}} </h5>
    </div>

@endif