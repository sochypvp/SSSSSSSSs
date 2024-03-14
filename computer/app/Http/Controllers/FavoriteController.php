<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //
    public function ShowData(Request $request){
        $fav = new Favorite();
        $data = $fav::all();

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
        $fav = new Favorite();
        $fav->productId = $request->productId;
        $fav->datetime = $request->datetime;
        $fav->customerId = $request->customerId;

        if($fav->save()){
            $data = $fav::latest()->first();
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
        $fav = new Favorite();
        $fav->id = $request->id;

        $data = $fav::find($fav->id);

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
        $fav = new Favorite();
        $fav->id = $request->id;
        $fav->productId = $request->productId;
        $fav->datetime = $request->datetime;
        $fav->customerId = $request->customerId;

        $data = $fav::where('id', $fav->id)->update([
            'productId' => $fav->productId,
            'datetime' => $fav->datetime,
            'customerId' => $fav->customerId,
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
