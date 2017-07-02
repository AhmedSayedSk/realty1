<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

@if($type == 'price')
  {!! Form::open(["url"=>"/search/price"]) !!}
    <div class="form-group">
      {!! Form::text("lower_price", "", ["class"=>"form-control", "placeholder"=>"From"]) !!}
    </div>
    <div class="form-group">
      {!! Form::text("higher_price", "", ["class"=>"form-control", "placeholder"=>"to"]) !!}
    </div>
    {!! Form::submit("Search", ["class"=>"btn btn-primary"]) !!}
  {!! Form::close() !!}



@elseif($type == 'area')
  {!! Form::open(["url"=>"/search/area"]) !!}
    <div class="form-group">
      {!! Form::text("lower_area", "", ["class"=>"form-control", "placeholder"=>"From"]) !!}
    </div>
    <div class="form-group">
      {!! Form::text("higher_area", "", ["class"=>"form-control", "placeholder"=>"to"]) !!}
    </div>
    {!! Form::submit("Search", ["class"=>"btn btn-primary"]) !!}
  {!! Form::close() !!}



@elseif($type == 'country')
  {!! Form::open(["url"=>"/search/country"]) !!}
    <div class="form-group">
      {!! Form::text("country", "", ["class"=>"form-control", "placeholder"=>"Country"]) !!}
    </div>
    {!! Form::submit("Search", ["class"=>"btn btn-primary"]) !!}
  {!! Form::close() !!}



@elseif($type == 'city')
  {!! Form::open(["url"=>"/search/city"]) !!}
    <div class="form-group">
      {!! Form::text("country", "", ["class"=>"form-control", "placeholder"=>"country"]) !!}
    </div>
    <div class="form-group">
      {!! Form::text("city", "", ["class"=>"form-control", "placeholder"=>"City"]) !!}
    </div>
    {!! Form::submit("Search", ["class"=>"btn btn-primary"]) !!}
  {!! Form::close() !!}



@elseif($type == 'region')
  {!! Form::open(["url"=>"/search/region"]) !!}
    <div class="form-group">
      {!! Form::text("country", "", ["class"=>"form-control", "placeholder"=>"Country"]) !!}
    </div>
    <div class="form-group">
      {!! Form::text("city", "", ["class"=>"form-control", "placeholder"=>"City"]) !!}
    </div>
    <div class="form-group">
      {!! Form::text("region", "", ["class"=>"form-control", "placeholder"=>"Region"]) !!}
    </div>
    {!! Form::submit("Search", ["class"=>"btn btn-primary"]) !!}
  {!! Form::close() !!}



@elseif($type == 'type')
  {!! Form::open(["url"=>"/search/type"]) !!}
    <div class="form-group">
      {!! Form::radio('type','rent',["class"=>"form-control"]) !!} Rent
      {!! Form::radio('type','sell',["class"=>"form-control"]) !!}  Sell
    </div>
    {!! Form::submit("Search", ["class"=>"btn btn-primary"]) !!}
  {!! Form::close() !!}



@endif