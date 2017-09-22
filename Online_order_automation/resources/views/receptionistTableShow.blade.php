<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Management</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/returent.css') }}">
</head>

<body class="container">

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				{{-- <a class="navbar-brand" href="#myPage">HOME</a> --}}
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<!-- <li><a href="#">Show Table Order</a></li> -->
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid text-center">    
  		<div class="row content">
  			<div class="col-sm-2">
  				
  			</div> 

  			<div class="col-sm-8 container-fluid">

  				@php
  					$i = -1;
  				@endphp

  				@foreach ($tableNumbers as $singleTable)
  					
  					@php
  						$i++;
  					@endphp


	  				<div class="col-sm-12 well" id="table_number_{{ $singleTable['table_number'] }}">


	  					<h3 style="border: 2px solid gray; padding: 5px">#Table No {{ $singleTable['table_number'] }}</h3>
	                	<h4>Selected Items</h4>

	                	<table class="table  table-bordered text-left">
						    <thead>
						      <tr>
						        <th>Serial</th>
						        <th>Item Name</th>
						        <th>No Of Item</th>
						        <th>Per Item Price</th>
						        <th>Total Item Price</th>
						        {{-- <th>Aproximate Time</th> --}}
						      </tr>
						    </thead>
						    <tbody>

						    @php
						    	$j = 1;

						    	$totalItem = 0;

						    	$totalPrice = 0;
						    @endphp

						    	@foreach ($orderInstance as $singleItem)

						    		{{-- {{ $singleItem->table_number }} --}}
						    		
						    		@if ($singleItem->table_number == $singleTable['table_number'])

						    			@php
						    				$totalItem += $singleItem->item_quantity;

						    				$totalPrice += $singleItem->item_quantity * $singleItem->itemDetails->price;
						    			@endphp
						    			
						    			<tr>
								    		<td>{{ $j++ }}</td>
								    		<td>{{ $singleItem->itemDetails->name }}</td>
								    		<td>{{ $singleItem->item_quantity }}</td>
								    		<td>{{ $singleItem->itemDetails->price }} tk</td>
								    		<td>{{ $singleItem->item_quantity * $singleItem->itemDetails->price }} tk</td>
								    		{{-- <td>{{ $singleItem->itemDetails->minimum_time }}</td> --}}
								    	</tr>
						    			
						    		@endif

							    
						    		
						    	@endforeach



						    	
						    	<tr>
						    		<td colspan="2">Total</td>
						    		<td>{{ $totalItem }}</td>
						    		<td></td>
						    		<td>{{ $totalPrice }} tk</td>
						    	</tr>
						    </tbody>
						</table>

						
						<div class="col-sm-4"></div>
						<div class="col-sm-4"><a id="print_bill" href="{{ route('receptionist.print_bill', ['id' => $singleTable['table_number']]) }}" class="list-group-item">Print Bill

						<p id="table_number" style="display: none;">{{ $singleTable['table_number'] }}</p>

						</a>


						</div>

	  				</div>


  				@endforeach



  				{{-- <div class="col-sm-12 well">
  					<h3 style="border: 2px solid gray; padding: 5px">#Table No 1</h3>
                	<h4>Selected Items</h4>

                	<table class="table  table-bordered text-left">
					    <thead>
					      <tr>
					        <th>Serial</th>
					        <th>Item Name</th>
					        <th>No Of Item</th>
					        <th>Price</th>
					        <th>Aproximate Time</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>01</td>
					    		<td>Barger</td>
					    		<td>2</td>
					    		<td>100</td>
					    		<td>20min</td>
					    	</tr>
					    	<tr>
					    		<td>01</td>
					    		<td>Barger</td>
					    		<td>2</td>
					    		<td>100</td>
					    		<td>20min</td>
					    	</tr>
					    	<tr>
					    		<td>01</td>
					    		<td>Barger</td>
					    		<td>2</td>
					    		<td>100</td>
					    		<td>20min</td>
					    	</tr>
					    	<tr>
					    		<td colspan="3">Total</td>
					    		<td>300tk</td>
					    		<td>60min</td>
					    	</tr>
					    </tbody>
					</table>

					<div class="col-sm-4"> <a href="#" class="list-group-item">Add More</a></div>
					<div class="col-sm-4"></div>
					<div class="col-sm-4"><a href="#" class="list-group-item">Order Now</a></div>
					
  				</div> --}}
  				

  			</div>
  		</div>
	</div>






<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	<!-- Internal Script Section -->
	
</body>
</html>