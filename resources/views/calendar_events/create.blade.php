<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Booking</h2>
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

<div>
  <h3>Property type</h3>
  <h4> {{ $real_estate->property_type }}
  <br/>
  <br/>
  <h3>Address</h3>
  <h4> {{ $real_estate->address }}
  <br/>
  <br/>
  <h3>Area</h3>
  <h4> {{ $real_estate->area }}
  <br/>
  <br/>
  <h3>Floor</h3>
  <h4> {{ $real_estate->floor }}
  <br/>
  <br/>
</div>
   
<form action="{{ route('calendar_events.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="real_estate_id" value="{{$real_estate->id}}">
              <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Start:</strong>
                <input type="datetime-local" name="event_start" class="form-control" placeholder="Event start">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>End:</strong>
                <input type="datetime-local" name="event_end" class="form-control" placeholder="Event end">
            </div>
        </div>

        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Area:</strong>
                <input type="number" step="0.1" name="area" class="form-control" placeholder="Area">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Floor:</strong>
                <input type="number" name="floor" class="form-control" placeholder="Floor">
            </div>
        </div> -->

        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
