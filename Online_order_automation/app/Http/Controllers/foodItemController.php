<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class foodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = "normal")
    {
        // $food = new Food;

        // $foodCategory = $food::distinct()->select('category')->get();


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll($category)
    {

        // return $category;
        $food = new Food;

        $foodCategory = $food::distinct()->select('category')->get();

        if($category == "all")
            $foodItem = $food::all();
        else
            $foodItem = $food::where('category', $category)->get();

        // return $foodItem;

        return view('showItemToCustomer', compact(['foodItem', 'foodCategory']));
    }


    public function removeItems(Request $request)
    {
        // return $request->all();

        $jsonInput = $request->remove_item_list;

        $jsonData = json_decode($jsonInput);

        $i = -1;

        foreach ($jsonData as $singleData) {

            $i++;

            if($i == 0)
                continue;

            $removeItem = new Food;
            
            // echo $singleData[0]."<br>";
            // echo $singleData[1]."<br>";

            $itemsToBeRemoved = $removeItem::where('name', $singleData[0])
                                            ->where('category', $singleData[1])
                                            ->get();

            // return $itemsToBeRemoved[0]->id;
            $id = $itemsToBeRemoved[0]->id;



            $item = $removeItem::find($id);

            $item->available = 0;

            $item->save();



            // $itemsToBeRemoved->save();

        }

        return redirect()->route('customer.allView',['category' => "all"]);

        // dd($jsonData);
    }

    public function addAgain(Request $request)
    {
        // return $request->all();

        $item = new Food;

        $itemsToBeAdded = $item::find($request->item_id);

        $itemsToBeAdded->available = 1;

        $itemsToBeAdded->save();

        return redirect()->route('customer.allView',['category' => "all"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        // if($request->hasFile('photo')){

        //     return "dlfjsd";
        // }

        // $this->validate($request,[

        //     'name' => 'required|string',
        //     'category' => 'required|string',
        //     'price' => 'required|numeric|min:1|max:1000000',
        //     'minimum_time' => 'required|numeric|min:1|max:1000',
        //     'photo' => 'required|image',

        // ]);

        $food = new Food;

        $food->name = $request->menuname;
        $food->category = $request->category;
        $food->price = $request->price;
        $food->status = $request->status;
        $food->minimum_time = $request->time;


        if ($request->hasFile('photo')) {
            
            $imagePath = $request->photo->getClientOriginalName();
            // return $imagePath;

            $path = $request->photo->storeAs('public/images', $imagePath);
            // return $path;
            $food->photo = '/storage/images/'.$imagePath;
        }


        $food->save();

        return redirect()->route('customer.allView',['category' => "all"]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $food = new Food;

        $foodItem = $food::find($id);

        return view('showItems',compact('foodItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return "eidt $id";

        $item = new Food;

        $itemDetails = $item::find($id);

        return view('editItem',compact('itemDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = new Food;

        $foodItem = $food::find($id);

        $foodItem->name = $request->menuname;
        $foodItem->category = $request->category;
        $foodItem->price = $request->price;
        $foodItem->status = $request->status;

        if ($request->hasFile('photo')) {
            
            $imagePath = $request->photo->getClientOriginalName();
            // return $imagePath;

            $path = $request->photo->storeAs('public/images', $imagePath);
            // return $path;
            $foodItem->photo = '/storage/images/'.$imagePath;
            
        }

        $foodItem->save();

        return redirect()->route('customer.allView',['category' => $foodItem->category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = new Food;

        $foodItem = $food::find($id);

        $category = $foodItem->category;

        $foodItem->delete();

        return redirect()->route('customer.allView',['category' => $category]);
    }


    public function searchItem(Request $request)
    {
        
        // return $request->all();

        $search = $request->input_text;

        $foodInstance = Food::where('name', 'LIKE', "%$search%")->orWhere('category', 'LIKE', "%$search%")->get();

        // return $foodInstance;

        return view('showSearchResult', compact('foodInstance'));

        // ret
    }
}
