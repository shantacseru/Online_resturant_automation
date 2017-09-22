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
				<!-- <a class="navbar-brand" href="#myPage">HOME</a> -->
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<!-- <li><a href="#">Order</a></li> -->
					<li><a href="{{ route('customer.showItems',['category' => "all"]) }}">All Items</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid"> 

		<div class="row">
			<div class="col-sm-1">
				
			</div>

			<div class="col-sm-10">
				<div class="col-sm-12"  style="border-bottom: 3px solid black; margin-bottom: 8px;"  >
					<h1>Search Results</h1>
				</div>


				@foreach ($foodInstance as $singleItem)
					


					<div class="col-sm-4">
						<div class="text-center well">
						<img src="{{ $singleItem->photo }}" class="img-rounded" width="100%" height="150px">
							<h3><strong></strong> <i>{{ $singleItem->name }}</i></h3>

							<h4><strong>Catagory: </strong> <i>{{ $singleItem->category }}</i></h4>

							<h4><strong>Price: </strong> <i>{{ $singleItem->price }} tk</i></h4>
							
							

							<br><br>

							<button id="order_customer" class="btn btn-info add-menu">Order Now

							<p id="hidden_route" style="display: none;">{{ route('customer.order', ['catagory' => $singleItem->category,'id'=> $singleItem->id]) }}
							</p>

							

						</button>

						</div>
					</div>

					
				@endforeach





			</div>
		</div>
	</div>






<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>

	<!-- Internal Script Section -->
	
</body>
</html>