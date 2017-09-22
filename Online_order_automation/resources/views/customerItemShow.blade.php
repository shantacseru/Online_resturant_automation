@extends('layouts.customerLayout')


@section('category-list')

	<a href="{{ route('customer.showItems',['category' => "all"])  }}" class="list-group-item"> All  </a>

	@foreach($foodCategory as $category)
		<a href="{{ route('customer.showItems',['category' => $category->category])  }}" class="list-group-item">{{ $category->category  }}</a>
	@endforeach

@endsection



@section('recent-food-item')

	@foreach($foodItem as $item)

		@if($item->status == "recent" && $item->available == 1)

			<div class="col-sm-4">
				<div class="text-center well">
				<img src="{{ $item->photo }}" class="img-rounded" width="100%" height="150px">
					<h3><strong></strong> <i>{{ $item->name }}</i></h3>
					<h4><strong>Price: </strong> <i>{{ $item->price }} tk</i></h4>
					
					{{-- {{ $item->catagory }} --}}

					<br><br>

					{{-- <a href=""> --}}
						<button id="order_customer" class="btn btn-info add-menu">Order Now

							<p id="hidden_route" style="display: none;">{{ route('customer.order', ['catagory' => $item->category,'id'=> $item->id]) }}
							</p>

							

						</button>

					{{-- </a> --}}

						

				</div>
			</div>
		@endif

	@endforeach

@endsection



@section('special-food-item')

	@foreach($foodItem as $item)

		@if($item->status == "special" && $item->available == 1)

			<div class="col-sm-4">
				<div class="text-center well">
				<img src="{{ $item->photo }}" class="img-rounded" width="100%" height="150px">
					<h3><strong></strong> <i>{{ $item->name }}</i></h3>
					<h4><strong>Price: </strong> <i>{{ $item->price }} tk</i></h4>
					
					

					<br><br>

					<button id="order_customer" class="btn btn-info add-menu">Order Now

							<p id="hidden_route" style="display: none;">{{ route('customer.order', ['catagory' => $item->category,'id'=> $item->id]) }}
							</p>

							

						</button>

				</div>
			</div>
		@endif

	@endforeach

@endsection



@section('all-food-item')

	@foreach($foodItem as $item)

		@if($item->status == "normal" && $item->available == 1)

			<div class="col-sm-4">
				<div class="text-center well">
				<img src="{{ $item->photo }}" class="img-rounded" width="100%" height="150px">
					<h3><strong></strong> <i>{{ $item->name }}</i></h3>
					<h4><strong>Price: </strong> <i>{{ $item->price }} tk</i></h4>
					
					

					<br><br>

					
					<button id="order_customer" class="btn btn-info add-menu">Order Now

							<p id="hidden_route" style="display: none;">{{ route('customer.order', ['catagory' => $item->category,'id'=> $item->id]) }}
							</p>

							

						</button>
					

				</div>
			</div>

			 
		@endif

	@endforeach

@endsection