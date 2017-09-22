<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Food;
use App\Receptionist;
// use Cron\validate;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    public function showItems($category)
    {
    	// return "something";
    	// return $category;
    	$food = new Food;

    	$foodCategory = $food::distinct()->select('category')->get();

    	if($category == "all")
    	    $foodItem = $food::all();
    	else
    	    $foodItem = $food::where('category', $category)->get();

    	// return $foodItem;

    	return view('customerItemShow', compact(['foodItem', 'foodCategory']));

    }

    public function orderItem(Request $request,$catagory,$id)
    {
    	
    	// return $id;

    	$item = Food::find($id);

    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($item, $item->id);


    	$request->session()->put('cart', $cart);

    	return redirect()->route('customer.showItems', ['catagory' => $catagory]);

    	$getSessionData = Session::get('cart');
    	dd($getSessionData);
    }


    public function myOrder()
    {
    	
    	$getSessionData = Session::get('cart');

    	if($getSessionData)
    		$itemData = $getSessionData->items;
    	else
    		$itemData = null;


    	return view('customerCart', compact('getSessionData', 'itemData'));
    }


    public function checkOut(Request $request)
    {
    	

    	$jsonInputData = $request->cart_table;

    	$jsonData = json_decode($jsonInputData);

    	// dd($jsonData);

    	// return $jsonData;

    	// dd($jsonData;

    	$request->session()->flush();

    	$i = -1;


    	foreach ($jsonData as $singleOrder) {

    		$i++;
    		
    		if($i == 0)
    			continue;

    		$id = $singleOrder[0];
    		$quantity = $singleOrder[1];

    		for ($j=0; $j < $quantity; $j++) { 
    			
    			$item = Food::find($id);

    			$oldCart = Session::has('cart') ? Session::get('cart') : null;
    			$cart = new Cart($oldCart);
    			$cart->add($item, $item->id);


    			$request->session()->put('cart', $cart);
    		}




    	}

    	return redirect()->route('customer.table_number');


    }




    function tableNumber()
    {
    	
    	return view('customerTableInput');
    }


    public function confirmOrder(Request $request)
    {
    	
    	// return $request->all();

    	$tableNumber = $request->tableNo;

        // $rules = ['table_number' => 'required|unique:receptionists'];
        // $this->validate($request, $rules);
        
        $isTableHas = Receptionist::where('table_number', $tableNumber)->get();

        // return $isTableHas;
        // return count($isTableHas);

        // if(!count($isTableHas))
        //     return "something";
        // else if(empty($isTableHas))
        //     return "something";

        if(count($isTableHas))
            return redirect()->back();
    	

    	$getSessionData = Session::get('cart');
    	
    	if($getSessionData)
    		$itemData = $getSessionData->items;
    	else
    		$itemData = null;

    	foreach ($itemData as $cartData) {
    		

    		foreach ($itemData as $singleOrder) {
    			
    			$receptionisInstance = new Receptionist;

				$receptionisInstance->table_number = $tableNumber;
				$receptionisInstance->item_number = $singleOrder["item"]["id"];
				$receptionisInstance->item_quantity = $singleOrder["quantity"];

				$receptionisInstance->save();

    		}

    		break;



    	}

    	$request->session()->flush();

    	return redirect()->route('customer.success_order');


    }






    public function successOrder()
    {
    	
    	return view('customerOrderSuccess');
    }



    public function tableInfo()
    {
    	
    	$orderInstance = Receptionist::orderBy('table_number')->get();

    	// return $orderInstance;

    	// foreach ($orderInstance as $singleOrder) {
    		
    	// 	// dd($singleOrder->itemDetails());

    	// 	return $singleOrder->itemDetails->name;
    	// }

    	$tableNumbers = Receptionist::select('table_number')->orderBy('table_number')->distinct()->get();

    	// return $tableNumbers[0]['table_number'];

    	return view('receptionistTableShow', compact('orderInstance', 'tableNumbers'));
    }


    public function printBill($id)
    {
    	
    	// return $id;

    	$receptionisInstance = Receptionist::where('table_number', $id)->get();

    	// return $receptionisInstance;

    	foreach ($receptionisInstance as $singleOrder) {
    		
    		// return $singleOrder->id;
    		$id = $singleOrder->id;

    		$orderInstance = Receptionist::find($id);

    		$orderInstance->delete();
    	}


    	return redirect()->route('receptionist.table_info');
    }


    public function searchItem(Request $request)
    {
        
        $search = $request->input_text;

        $foodInstance = Food::where('name', 'LIKE', "%$search%")->orWhere('category', 'LIKE', "%$search%")->get();

        // return $foodInstance;

        return view('customerSearchResult', compact('foodInstance'));
    }
}
