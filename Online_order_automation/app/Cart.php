<?php

namespace App;



class Cart
{
   	
	public $items = null;
	public $total_quantity = 0;
	public $total_price = 0;


	public function __construct($oldCart){

		if($oldCart){

			$this->items = $oldCart->items;
			$this->total_quantity = $oldCart->total_quantity;
			$this->total_price = $oldCart->total_price;
			
		}
	}

	public function add($item, $id)		
	{
		$storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];

		if($this->items){

			if(array_key_exists($id, $this->items)){

				$storedItem = $this->items[$id];
			}
		}

		$storedItem['quantity']++;
		$storedItem['price'] = $storedItem['quantity'] * $item->price;

		$this->items[$id] = $storedItem;

		$this->total_quantity++;
		$this->total_price += $item->price;
	}

}
