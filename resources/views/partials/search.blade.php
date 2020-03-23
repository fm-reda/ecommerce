<form action="{{(route('products.search'))}}" class="d-flex mr-3">
    <div class="form-group mb-0 mr-1">
        <input type="text" name="q" id="" class="form-control" value="{{request()->q ? : ''}}">
    </div>

    <button type="submit" class="btn btn-primary" value=""><i class="fa fa-search" aria-hidden="true"></i></button>

</form>
