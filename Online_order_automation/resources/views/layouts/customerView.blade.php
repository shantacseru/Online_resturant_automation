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
					<li><a href="{{ route('item.create') }}">Add Item</a></li>
					<!-- <li><a href="#">Rate Food</a></li> -->
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


				{{-- <div id="sticky">
					<button id="popoverMenuItems" type="button" class="btn btn-info pull-right" data-container="body" data-toggle="popover" data-placement="left" title="Tomorow's Menu" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
					  Menu Items
					</button>
				</div> --}}

				<div id="sticky">
					{{-- <button id="popoverMenuItems" type="button" class="btn btn-info pull-right">
					  Menu Items
					</button> --}}

					<button id="popoverMenuItems" type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target=".bs-example-modal-lg">Will Be Removed Menu Items</button>
				</div>






				{{-- <div id="sticky" class="pull-right">
					<button id="popoverMenuItems" type="button" class="btn btn-info" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." >
					  Menu Items
					</button>
				</div> --}}

				<div class="col-sm-offset-8 col-sm-4">
					<div id="custom-search-input">
		               <form method="post" action="{{ route('admin.search') }}" style="display: inline-block;">

		                    {{ csrf_field() }}
			                <div class="input-group col-md-12">


			                    <input type="text" class="form-control input-lg" placeholder="search" name="input_text" />
			                    <span class="input-group-btn">
			                        


				                        <button class="btn btn-info btn-lg" type="submit">
				                            <i class="glyphicon glyphicon-search"></i>
				                        </button>

			                    </span>
			                </div>
		                 </form>
					</div>
				</div>

				<div class="col-sm-12"  style="border-bottom: 3px solid black; margin-bottom: 8px;"  >
					<h1>Recent</h1>
				</div>
				<div class="row">

					@yield('recent-food-item')

					

				</div>


				<div class="col-sm-12"  style="border-bottom: 3px solid black; margin-bottom: 8px;"  >
					<h1 >Special</h1>
				</div>

				<div class="row">

					@yield('special-food-item')

					
				</div>



				<div class="col-sm-12"  style="border-bottom: 3px solid black; margin-bottom: 8px;"  >
					<h1 >All</h1>
				</div>

				<div class="row">

					@yield('all-food-item')

					
					

				</div>


			</div>
		</div>
	</div>



	




	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 style="text-align: center;" class="modal-title" id="gridSystemModalLabel">Items that will be removed</h4>
	      </div>

	      <div class="modal-body">

	      	<table id="admin_menu_set_table" class="responstable">
	      	  
	      	  <tr>
	      	    <th>Item Name</th>
	      	    <th>Item Category</th>
	      	    <th>Action</th>
	      	    
	      	    
	      	  </tr>
	      	  
	      	  
	      	  {{-- <tr>
	      	      
	      	      <td>Fast Food</td>
	      	      <td>Burger</td>
	      	      
	      	      
	      	  </tr> --}}
	      	  
	      	  
	      	</table>

	        <div class="single_item">
	          
	        </div>
	        
	        
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <form style="display: inline-block;" method="post" action="{{ route('remove.items') }}">

	        	{{ csrf_field() }}
	        	<input id="remove-item-list" type="hidden" name="remove_item_list">
		        <button id="remove-items" type="submit" class="btn btn-primary" >Remove Items</button>
	        </form>

	      </div>

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


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