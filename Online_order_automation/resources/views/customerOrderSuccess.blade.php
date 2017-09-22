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

				
                <h3>Your order has accepted</h3>
				   
				
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