<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function ShowData(Request $request){
        $brand = new Brand();

        $data = $brand::all();
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
    //========================Insert
    public function InsertData(Request $request){
        $brand = new Brand();
        $brand->brandName = $request->brandName;
        $brand->logo = $request->logo;

        if($brand->save()){
            $data = $brand::latest()->first();
            return response([
                'message' => 'Insert Data Successfully',
                'status' => true,
                'data' => $data,
            ]);
            return response([
                'message' => 'Insert fail',
                'status' => false,
            ]);
        }
    }

    public function DeleteData(Request $request){
        $brand = new Brand();
        $brand->id = $request->id;

        $data = $brand::find($brand->id);
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
        $brand = new Brand();
        $brand->id = $request->id;
        $brand->brandName = $request->brandName;
        $brand->logo = $request->logo;

        $data = $brand::where('id', $brand->id)->update([
            'brandName' => $brand->brandName,
            'logo' => $brand->logo,
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
