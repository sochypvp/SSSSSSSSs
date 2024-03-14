<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function ShowData(Request $request){
        $cart = new Cart();
        $data = $cart::all();

        if(!$data){
            return response([
                'message' => 'Record founded',
                'status' => false
            ]);
        }
        return response([
            'message' => 'Record founded',
            'status' => true,
            'data' => $data
        ]);
    }

    public function InsertData(Request $request){
        $cart = new Cart();
        $cart->productId = $request->productId;
        $cart->customerId = $request->customerId;

        if($cart->save()){
            $data = $cart::latest()->first();
            return response([
                'message' => 'Insert Successfully',
                'status' => true,
                'data' => $data,
            ]);
        }
        return response([
            'message' => 'Insert failed',
            'status' => false,
        ]);
    }

    public function DeleteData(Request $request){
        $cart = new Cart();
        $cart->id = $request->id;

        $data = $cart::find($cart->id);

        if($data->delete()){
            return response([
                'message' => 'Delete Successfully',
                'status' => true,
            ]);
        }
        return response([
            'message' => 'Delete failed',
            'status' => false,
        ]);
    }
    public function UpdateData(Request $request){
        $cart = new Cart();
        $cart->id = $request->id;
        $cart->productId = $request->productId;
        $cart->customerId = $request->customerId;

        $data = $cart::where('id', $cart->id)->update([
            'productId' => $cart->productId,
            'customerId' => $cart->customerId,
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
