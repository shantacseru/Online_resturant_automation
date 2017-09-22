$(document).ready(function(){

	

	// for sticky
	$("#sticky").sticky({
		topSpacing: 300,
		zIndex: 111
	});

	
	var textForMenuItem = "";
	var id = 0;
	var jsonItem;


	$('#remove-items').click(function() {


		$('#remove-item-list').val(jsonItem);

		console.log($('#remove-item-list').val());


	});


	$('#popoverMenuItems').click(function() {
		
		// $('#admin_menu_set_table').append(textForMenuItem);
		jsonItem = html2json();

		// alert(jsonItem);
	});

	$('.item-remove').click(function() {
		
		$(this).removeClass('btn-danger');
	});

	$('.add-menu-after-removing').click(function() {
		


	});
	
	// var table = $('#admin_menu_set_table').tableToJSON();

	function html2json() {
	   var json = '{';
	   var otArr = [];
	   var tbl2 = $('#admin_menu_set_table tr').each(function(i) {        
	      x = $(this).children();
	      var itArr = [];
	      x.each(function() {
	         itArr.push('"' + $(this).text() + '"');
	      });
	      otArr.push('"' + i + '": [' + itArr.join(',') + ']');
	   })
	   json += otArr.join(",") + '}'

	   return json;
	}

	


	$('.add-menu').click(function() {

		$(this).removeClass('btn-info');
		$(this).addClass('btn-danger');

		var item = $(this).find('input[name="item_name"]').val();
		var category = $(this).find('input[name="item_category"]').val();


		var text = '<tr id="item-' + id + '"><td>'+ item + '</td><td>'+ category + '</td><td><button class="btn btn-danger remove-from-list" value ="'+ id + '">Remove</button></td></tr>';


		id++;

		
		$('#admin_menu_set_table').append(text);
	});


	$('.remove-from-list').click(function() {
		

		var idNum = $(this).val();

		var id = '#item-' + idNum;

		$(id).remove();
	});


	$(document).on('change', '#item_quantity', function() {
		
		var current_item_quantity = $(this).find('#item_quantity_value').val();
		var previous_item_quantity = $(this).find('#hidden_item_quantity_previous').val();
		var serial_number = $(this).find('#hidden_item_serial_number').val();
		var item_per_unit_price = $(this).find('#hidden_item_perUnit_price').val();
		item_per_unit_price = parseInt(item_per_unit_price, 10);
		// console.log(previous_item_quantity);

		var item_price_id = "#item_price_" + serial_number;
		// var item_price = $(item_price_id).text();
		// console.log(item_per_unit_price);

		var current_item_total_price = current_item_quantity * item_per_unit_price;
		$(item_price_id).text(current_item_total_price);

		var total_item_quantity = $('#total_quantity').text();
		// total_item_quantity = parseInt(total_item_quantity, 10);

		var total_price = $('#total_price').text();
		// total_price = total_price.slice(1);
		total_price = parseInt(total_price,10);
		console.log(total_price);

		console.log(current_item_quantity);
		console.log(previous_item_quantity);

		if(current_item_quantity > previous_item_quantity){
			// console.log('increment');

			total_item_quantity++;
			total_price += item_per_unit_price;
		}
		else if(current_item_quantity < previous_item_quantity){

			// console.log('decrement');

			total_item_quantity -= 1;
			total_price -= item_per_unit_price;
		}

		// console.log(total_price);


		$('#total_quantity').text(total_item_quantity);
		$('#total_price').text(total_price + "tk");

		$('#hidden_total_price').val(total_price);
		$(this).find('#hidden_item_quantity_previous').val(current_item_quantity);

		var hidden_quantity_id = "#item_quantity_hidden_" + serial_number;
		$(hidden_quantity_id).text(current_item_quantity);


	});



	function cartTableHtml2Json() {
	   var json = '{';
	   var otArr = [];
	   var tbl2 = $('#cart-table tr').each(function(i) {        
	      x = $(this).children();
	      var itArr = [];
	      x.each(function() {
	         itArr.push('"' + $(this).text() + '"');
	      });
	      otArr.push('"' + i + '": [' + itArr.join(',') + ']');
	   })
	   json += otArr.join(",") + '}'

	   return json;
	}


	$(document).on('click', '#check_out_button', function() {
		
		
		var jsonData = cartTableHtml2Json();

		$('#cart_table_value').val(jsonData);
		


	});

	$(document).on('click', '#order_customer', function() {
		
		var result = confirm('Please Confirm Order');
		
		if(result == true){

			var routeResult = $(this).find('#hidden_route').text();

			console.log(routeResult);
			window.location.replace(routeResult);
		}
		else{

			console.log('somthing');
		}
	});


	$(document).on('click', '#print_bill', function() {
		

		
		var table_number = $(this).find('#table_number').text();

		var divNo = "#table_number_" + table_number;

		$(divNo).printElement();
	});


	
});