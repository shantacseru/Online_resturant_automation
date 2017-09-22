@extends('layouts.app');

@section('cssfile')

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('content')

 <div class="container">
        
            <div class="col-md-8 col-md-offset-2 well cls1">
              <form action="{{ route('item.update',['id' => $itemDetails->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
         <!-- // <form class="form-horizontal" role="form"> -->

                     {{csrf_field()}} 

                <input type="hidden" name="_method" value="PUT">


                <div class="form-group">
                    <label class="col-md-3 control-label">Name:</label>
                    <div class="col-md-8">
                      <input  class="form-control" type="text" name="menuname" value="{{ $itemDetails->name }}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Catagory:</label>
                    <div class="col-md-8">
                       <select name="category" class="form-control">
                        <!-- <option value="" disabled selected hidden>Select Catagory.</option> -->
                        <option
                           @if($itemDetails->category == "appetizers")
                             {{ 'selected' }}
                            @endif
                         value="appetizers">appetizers</option>
                        <option
                           @if($itemDetails->category == "sandwiches")
                             {{ 'selected' }}
                            @endif
                         value="sandwiches">sandwiches</option>
                        <option
                           @if($itemDetails->category == "grill")
                             {{ 'selected' }}
                            @endif
                         value="grill">grill</option>
                        <option
                           @if($itemDetails->category == "salads")
                             {{ 'selected' }}
                            @endif
                         value="salads">salads</option>
                        <option
                           @if($itemDetails->category == "vegetarian")
                             {{ 'selected' }}
                            @endif
                         value="vegetarian">vegetarian</option>
                        <option
                           @if($itemDetails->category == "pizza")
                             {{ 'selected' }}
                            @endif
                         value="pizza">pizza</option>
                        <option
                           @if($itemDetails->category == "desserts")
                             {{ 'selected' }}
                            @endif
                         value="desserts">desserts</option>
                      </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">Price:</label>
                    <div class="col-md-8">
                      <input  class="form-control" type="text" name="price" value="{{ $itemDetails->price }}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Status:</label>
                    <div class="col-md-8">
                      <select name="status" class="form-control">
                        

                        <option 
                            @if($itemDetails->status == "recent")
                             {{ 'selected' }}
                            @endif
                          value="recent">Recent</option>
                        <option 
                            @if($itemDetails->status == "special")
                             {{ 'selected' }}
                            @endif
                          value="special">Special</option>
                        <option 
                            @if($itemDetails->status == "normal")
                             {{ 'selected' }}
                            @endif
                          value="normal">Normal</option>
                       
                      </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">Minimum Time To serve:</label>
                    <div class="col-md-8">
                      <input  class="form-control" type="text" name="time" value="{{ $itemDetails->minimum_time }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Upload Image:</label>
                    <div class="col-md-8">
                       <input type="file" name="photo">
                    </div>
                </div>








              <!--   <div class="form-group" style="margin-left: 190px;">

                 
                     <input type="file" name="file">



                </div>
 -->
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                      <button class="btn btn-primary pull-right " type="submit" style="width: 140px;"> OK</button>
                    </div>
                </div>
            </form>
    </div>


             






       </div>





@endsection