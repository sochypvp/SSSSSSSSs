<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function ShowData(Request $request){
        $cus = new Customer();

        $data = $cus::all();
        if(!$data){
            return response([
                'message' => 'Record not found',
                'status' => false,
            ]);
        }
        return response([
            'message' => 'Record found',
            'status' => true,
            'data' => $data
        ]);
    }
    public function InsertData(Request $request){
        $cus = new Customer();
        $cus->customerName = $request->customerName;
        $cus->customerPhone = $request->customerPhone;
        $cus->customerAddress = $request->customerAddress;
        $cus->customerEmail = $request->customerEmail;
        $cus->deliveryAddress = $request->deliveryAddress;
        $cus->accountId = $request->accountId;

        if($cus->save()){
            $data = Customer::latest()->first();
            return response([
                'message' => 'it is Work',
                'status' => true,
                'data' => $data,
            ]);
        }
        return response([
            'message' => 'Error',
            'status' => false,
        ]);
    }
    public function DeleteData(Request $request){
        $cus = new Customer();
        $cus->id = $request->id;

        $data = $cus::find($cus->id);
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
        $cus = new Customer();
        $cus->id = $request->id;
        $cus->customerName = $request->customerName;
        $cus->customerPhone = $request->customerPhone;
        $cus->customerAddress = $request->customerAddress;
        $cus->customerEmail = $request->customerEmail;
        $cus->deliveryAddress = $request->deliveryAddress;
        $cus->accountId = $request->accountId;

        $data = $cus::where('id', $cus->id)->update([
            'customerName' => $cus->customerName,
            'customerPhone' => $cus->customerPhone,
            'customerAddress' => $cus->customerAddress,
            'customerEmail' => $cus->customerEmail,
            'deliveryAddress' => $cus->deliveryAddress,
            'accountId' => $cus->accountId,
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
