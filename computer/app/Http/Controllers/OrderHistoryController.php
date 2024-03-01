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

        $data = Order_history::find($oh->id);
        if($data->delete()){
            return response([
                'message' => 'Record deleted successfully',
                'status' => true,
            ]);
        }
        return response([
            'message' => 'Error deleting record',
            'status' => false,
        ]);


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
