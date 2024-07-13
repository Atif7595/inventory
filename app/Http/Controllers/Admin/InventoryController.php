<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(){
        $categories= Category::where('status', 'Active')->get();
        $inventories= Inventory::with('category')->get();
        return view('inventory.index',compact('inventories','categories'));
    }
    public function store(Request $request){
        try{
            Inventory::create([
                'item_name' => $request->name,
                'description'=> $request->description,
                'quantity'=> $request->quantity,
                'price'=> $request->price,
                'local'=> $request->local,
                'status'=> $request->status,
                'date'=> $request->date,
                'category_id'=> $request->category,
                'stock'=> $request->stock,
            ]);
            return response()->json(['success'=> true,'message'=> 'Stock Added Succesfully']);
          }catch(\Exception $e){
            return response()->json(['success'=> false, 'message'=> $e->getMessage()]);
          }
       }


       public function edit($id){
        try {
            $category = Inventory::whereId($id)->first();
            return response()->json(['success' => true, 'data' => $category, 'message' => 'Inventory data']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function update(Request $request){
        try{
            Inventory::whereId($request->id)->update([
                'item_name' => $request->name,
                'description'=> $request->description,
                'quantity'=> $request->quantity,
                'price'=> $request->price,
                'local'=> $request->local,
                'status'=> $request->status,
                'date'=> $request->date,
                'category_id'=> $request->category,
                'stock'=> $request->stock,
            ]);
            return response()->json(['success'=> true,'message'=> 'Stock Updated Succesfully']);
          }catch(\Exception $e){
            return response()->json(['success'=> false, 'message'=> $e->getMessage()]);
          }

    }
    public function delete(Request $request){
        try {
            Inventory::whereId($request->id)->delete();
            return response()->json(['success' => true, 'message' => 'Deleted Category']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

       }
}
