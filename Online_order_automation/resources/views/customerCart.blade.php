<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Management</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/returent.css') }}">

    <style type="text/css">
    	
    	@import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
    	.rwd-table {
    	  margin: 1em 0;
    	  min-width: 300px;
    	}
    	.rwd-table tr {
    	  border-top: 1px solid #ddd;
    	  border-bottom: 1px solid #ddd;
    	}
    	.rwd-table th {
    	  display: none;
    	}
    	.rwd-table td {
    	  display: block;
    	}
    	.rwd-table td:first-child {
    	  padding-top: .5em;
    	}
    	.rwd-table td:last-child {
    	  padding-bottom: .5em;
    	}
    	.rwd-table td:before {
    	  content: attr(data-th) ": ";
    	  font-weight: bold;
    	  width: 6.5em;
    	  display: inline-block;
    	}
    	@media (min-width: 480px) {
    	  .rwd-table td:before {
    	    display: none;
    	  }
    	}
    	.rwd-table th, .rwd-table td {
    	  text-align: left;
    	}
    	@media (min-width: 480px) {
    	  .rwd-table th, .rwd-table td {
    	    display: table-cell;
    	    padding: .25em .5em;
    	  }
    	  .rwd-table th:first-child, .rwd-table td:first-child {
    	    padding-left: 0;
    	  }
    	  .rwd-table th:last-child, .rwd-table td:last-child {
    	    padding-right: 0;
    	  }
    	}

    	/*body {
    	  padding: 0 2em;
    	  font-family: Montserrat, sans-serif;
    	  -webkit-font-smoothing: antialiased;
    	  text-rendering: optimizeLegibility;
    	  color: #444;
    	  background: #eee;
    	}*/

    	h1 {
    	  font-weight: normal;
    	  letter-spacing: -1px;
    	  color: #34495E;
    	}

    	.rwd-table {
    	  background: #34495E;
    	  color: #fff;
    	  border-radius: .4em;
    	  overflow: hidden;
    	}
    	.rwd-table tr {
    	  border-color: #46637f;
    	}
    	.rwd-table th, .rwd-table td {
    	  margin: .5em 1em;
    	}
    	@media (min-width: 480px) {
    	  .rwd-table th, .rwd-table td {
    	    padding: 1em !important;
    	  }
    	}
    	.rwd-table th, .rwd-table td:before {
    	  color: #dd5;
    	}


    </style>
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
				<!-- <a class="navbar-brand" href="#myPage">HOME</a> -->
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">


					<li><a href="{{ route('customer.showItems', ['catagory' => "all"]) }}"><i class="fa fa-shopping-cart"></i>Food Items</a></li>


					<li><a href="{{ route('customer.my_order') }}"><i class="fa fa-shopping-cart"></i>My Order</a></li>
					
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid"> 

		<div class="row">
			<div class="col-sm-3">
				<div class="text-center">
					<ul class="list-group">
						@yield('category-list')
  					</ul>
				</div>
			</div>

			<div class="col-sm-9">

				@php
					
					$i = 1;

				@endphp

				

				<table id="cart-table" class="rwd-table">
				  <tr>
				    <th>Name</th>
				    <th>Catagory</th>
				    <th>Quantity</th>
				    <th>Item Price</th>
				    <th>Total Price</th>
				  </tr>@if ($itemData)@foreach ($itemData as $item)<tr>

				  <td style="display: none;">{{ $item['item']['id'] }}</td>
				  <td id="item_quantity_hidden_{{ $i }}" style="display: none;">{{ $item['quantity'] }}</td>

				  <td style="text-align: center;">{{ $item['item']['name'] }}</td><td style="text-align: center;">{{ $item['item']['category'] }}</td><td id="item_quantity" style="text-align: center;"><input id="item_quantity_value" style="color: black; text-align: center;" type="number" name="item_quantity" value="{{ $item['quantity'] }}" min="0"><input type="hidden" name="" id="hidden_item_quantity_current" value="{{ $item['quantity'] }}"><input type="hidden" name="" id="hidden_item_quantity_previous" value="{{ $item['quantity'] }}"><input type="hidden" name="" id="hidden_item_perUnit_price" value="{{ $item['item']['price'] }}"><input type="hidden" name="" id="hidden_item_serial_number" value="{{ $i }}"></td><td style="text-align: center;">{{ $item['item']['price'] }}tk</td><td id="item_price_{{ $i++ }}" style="text-align: center;">{{ $item['price'] }}tk</td></tr>@endforeach

				  <tr>
					    <td></td>
					    <td style="text-align: center;">Total Items</td>
					    <td id="total_quantity" style="text-align: center;">{{ $getSessionData->total_quantity }}</td>
					    <td style="text-align: center;">Total Price</td>
					    <td id="total_price" style="text-align: center;">{{ $getSessionData->total_price }}tk<input type="hidden" name="" id="hidden_total_price" value="{{ $getSessionData->total_price }}"></td>
				   </tr>@endif</table>

				   <form method="post" action="{{ route('customer.check_out') }}">
				   		{{ csrf_field() }}
				   		<button id="check_out_button" class="btn btn-danger pull-right" style="margin-right: 239px;">Check out

				   			<input type="hidden" id="cart_table_value" name="cart_table">
				   		</button>
				   	</form>
				
			</div>
		</div>
	</div>



	




	


<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>



    
	<!-- <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script> -->

	<!-- Internal Script Section -->
	
</body>
</html>