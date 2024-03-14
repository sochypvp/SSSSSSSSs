<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order_history;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    //
    public function ShowData(Request $request){
        $oh = new Order_history();

        $data = $oh::all();
        if(!$data){
            return response([
                'message' => 'Record not found',
                'status' => false,
            ]);
        }
        return response([
            'message' => 'Record found',
            'status' => true,
            'data' => $data,
        ]);
    }
<<<<<<< HEAD:computer/app/Http/Controllers/MainCategoriesController.php
    // =============================Insert
    public function addCategory(Request $request){
        $main = new Main_categories();
        $main->categoryName = $request->categoryName;
        $main->icon = $request->icon;

        if($main->save()){
            return redirect()->route('categories')->with(['message'=>'alert-success','text'=>'Category was added']);
        }
        return redirect()->route('categories')->with(['message'=>'alert-danger','text'=>'Something when wrong !!']);
    }
    // =============================Delete
    public function removeCategory(Request $request){

        $data = Main_categories::find($request->id);
=======
    public function InsertData(Request $request){
        // return response($request);
        $oh = new Order_history();
        $oh->productId = $request->productId;
        $oh->customerId = $request->customerId;

        if($oh->save()){
            $data = $oh::latest()->first();
            return response([
                'message' => 'Insert Data Successfully.',
                'status' => true,
                'data' => $data,
            ]);
        }
        return response([
            'message' => 'Insert Data Fail.',
            'status' => false,
        ]);
    }
    public function DeleteData(Request $request){
        $oh = new Order_history();
        $oh->id = $request->id;
>>>>>>> chai:computer/app/Http/Controllers/OrderHistoryController.php

        $data = Order_history::find($oh->id);
        if($data->delete()){
            return redirect()->route('categories')->with(['message'=>'alert-success','text'=>'Category was removed']);
        }
<<<<<<< HEAD:computer/app/Http/Controllers/MainCategoriesController.php
        return redirect()->route('categories')->with(['message'=>'alert-danger','text'=>'Something when wrong !!']);
    }
    // =============================Update
    public function UpdateData(Request $request){
        $main = new Main_categories();
        $main->id = $request->id;
        $main->categoryName = $request->categoryName;
        $main->icon = $request->icon;
=======
        return response([
            'message' => 'Error deleting record',
            'status' => false,
        ]);
>>>>>>> chai:computer/app/Http/Controllers/OrderHistoryController.php


    }
    public function UpdateData(Request $request){
        $oh = new Order_history();
        $oh->id = $request->id;
        $oh->productId = $request->productId;
        $oh->customerId = $request->customerId;


        $data = $oh::where('id', $oh->id)->update([
            'productId' => $oh->productId,
            'customerId' => $oh->customerId,
        ]);

        if($data){
            return response([
                'message' => 'Record updated successfully',
                'status' => true,
            ]);
        }
        return response([
            'message' => 'Error updating record',
            'status' => false,
        ]);
    }
}
