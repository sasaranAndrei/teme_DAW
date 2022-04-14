<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Real Estate</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('real_estates.index') }}"> Back</a>
        </div>
    </div>
</div>   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

  

<form action="{{ route('real_estates.update',$real_estate->id) }}" method="POST">

    @csrf

    @method('PUT')
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Property type:</strong>
                <input type="text" name="property_type" value="{{ $real_estate->property_type }}" class="form-control" placeholder="Property type">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address" value="{{ $real_estate->address }}" class="form-control" placeholder="Address">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Area:</strong>
                <input type="number" step="0.1" name="area" value="{{ $real_estate->area }}" class="form-control" placeholder="Area">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Floor:</strong>
                <input type="number" name="floor" value="{{ $real_estate->floor }}" class="form-control" placeholder="Floor">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
