<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\customer_user;
use Illuminate\Http\Request;

class cusUserController extends Controller
{
    public function ShowData(Request $request){
        $cus = new customer_user();

        $data = $cus::all();
        if(!$data){
            return response([
                'message' => 'Record not found',
                'status' => false,
            ]);
        }
        return response([
            'message' => 'Record Founded',
            'status' => true,
            'data' => $data,
        ]);
    }
    //=============================Insert
    public function InsertData(Request $request){
        $cus = new Customer_user();
        $cus->id = $request->id;
        $cus->username = $request->username;
        $cus->password = $request->password;

        if($cus->save()){
            $data = Customer_user::latest()->first();
            return response([
                'message' => 'Insert Data Successfully',
                'status' => true,
                'data' => $data,
            ]);
            return response([
                'message' => 'Can not Insert Data',
                'status' => false,
            ]);
        }
    }

    public function DeleteData(Request $request){
        $cus = new Customer_user();
        $cus->id = $request->id;
        $data = Customer_user::find($cus->id);

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
        $cus = new Customer_user();
        $cus->id = $request->id;
        $cus->username = $request->username;
        $cus->password = $request->password;

        $data = $cus::where('id', $cus->id)->update(['username' => $cus->username, 'password' => $cus->password]);
        
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
