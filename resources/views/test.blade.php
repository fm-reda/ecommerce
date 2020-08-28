@extends('layouts.master2')
@section('content')
<div class="container">

    <div class="row mt-5">
        <div class="col-md-3 border">
            Date
        </div>
        <div class="col-md-3 border">description</div>
        <div class="col-md-3 border">montant</div>
        <div class="col-md-3 border"> Action</div>
    </div>
    @foreach($datas as $item)

    @endforeach
    @for($i = 0; $i < 10; $i++) <div class="row">
        <div class="col-md-3 border">
            {{ $item->date}}
        </div>
        <div class="col-md-3 border"> <?php $item->description ?></div>
        <div class="col-md-3 border"> $item->montant</div>
        <div class="col-md-3 border">
            <button type="button" class="btn btn-outline-primary">supprimer</button>
        </div>
</div>
@endfor


</div>
</div>
</div>

@endsection