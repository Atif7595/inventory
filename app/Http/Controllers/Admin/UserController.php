<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users= User::where('is_role', 'user')->get();
        return view('users.index',compact('users'));

    }

    public function store(Request $request){
        try{
            User::create([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status
            ]);
            return response()->json(['success'=> true,'message'=> 'User Added Succesfully']);
          }catch(\Exception $e){
            return response()->json(['success'=> false, 'message'=> $e->getMessage()]);
          }
       }

       public function edit($id){
        try {
            $user = User::whereId($id)->first();
            return response()->json(['success' => true, 'data' => $user, 'message' => 'user data']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

    }
    public function update(Request $request){
        try{

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
            ];

            if ($request->has('password')) {
                $data['password'] = Hash::make($request->password);
            }

            User::whereId($request->id)->update($data);

            return response()->json(['success'=> true,'message'=> 'User Added Succesfully']);
          }catch(\Exception $e){
            return response()->json(['success'=> false, 'message'=> $e->getMessage()]);
          }
       }
       public function delete(Request $request){
        try {
            User::whereId($request->id)->delete();
            return response()->json(['success' => true, 'message' => 'Deleted User']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

       }
}
