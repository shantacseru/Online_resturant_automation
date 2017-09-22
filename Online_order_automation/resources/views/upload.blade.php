@extends('layouts.app');

@section('cssfile')

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('content')

 <div class="container">
        
            <div class="col-md-8 col-md-offset-2 well cls1">
              <form action="{{ route('item.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
         <!-- // <form class="form-horizontal" role="form"> -->

                     {{csrf_field()}} 


                <div class="form-group">
                    <label class="col-md-3 control-label">Name:</label>
                    <div class="col-md-8">
                      <input  class="form-control" type="text" name="menuname" placeholder="Input Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Catagory:</label>
                    <div class="col-md-8">
                       <select name="category" class="form-control">
                        <option value="" disabled selected hidden>Select Catagory.</option>
                        <option value="appetizers">appetizers</option>
                        <option value="sandwiches">sandwiches</option>
                        <option value="grill">grill</option>
                        <option value="salads">salads</option>
                        <option value="vegetarian">vegetarian</option>
                        <option value="pizza"> pizza</option>
                        <option value="desserts">desserts</option>
                      </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Status:</label>
                    <div class="col-md-8">
                      <select name="status" class="form-control">
                        
                        <option value="" disabled selected hidden>Select Status.</option>

                        <option value="recent">Recent</option>
                        <option value="special">Special</option>
                        <option value="normal">Normal</option>
                       
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Price:</label>
                    <div class="col-md-8">
                      <input  class="form-control" type="text" name="price" placeholder="Input Item Price">
                    </div>
                </div>






                <div class="form-group">
                    <label class="col-md-3 control-label">Minimum Time To serve:</label>
                    <div class="col-md-8">
                      <input  class="form-control" type="text" name="time" placeholder="Input Minimum Time">
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