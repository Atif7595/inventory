<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class CategoryController extends Controller
{
    public function index(){
        $categories= Category::get();
      return view('categories.index',compact('categories'));
    }
       public function store(Request $request){
        try{
            Category::create([
                'name'=> $request->category,
                'status' => $request->status
            ]);
            return response()->json(['success'=> true,'message'=> 'Category Added Succesfully']);
          }catch(\Exception $e){
            return response()->json(['success'=> false, 'message'=> $e->getMessage()]);
          }
       }

       public function edit($id){
        try {
            $category = Category::whereId($id)->first();
            return response()->json(['success' => true, 'data' => $category, 'message' => 'Category data']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

    }
       public function update(Request $request){
        try{
            Category::whereId($request->id)->update([
                'name'=> $request->category,
                'status' => $request->status
            ]);
            return response()->json(['success'=> true,'message'=> 'Category Edit Succesfully']);
          }catch(\Exception $e){
            return response()->json(['success'=> false, 'message'=> $e->getMessage()]);
          }

       }
       public function delete(Request $request){
        try {
            Category::whereId($request->id)->delete();
            return response()->json(['success' => true, 'message' => 'Deleted Category']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

       }

}
