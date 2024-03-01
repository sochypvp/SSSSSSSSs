<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //==============Show
    public function ShowData(Request $request){
        $pro = new Product();

        $data = $pro::all();
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
    //==============Show
    public function InsertData(Request $request){
        // return response($request);
        $pro = new Product();
        $pro->barcode = $request->barcode;
        $pro->productName = $request->productName;
        $pro->partNumber = $request->partNumber;
        $pro->specifications = $request->specifications;
        $pro->description = $request->description;
        $pro->price = $request->price;
        $pro->discount = $request->discount;
        $pro->warranty = $request->warranty;
        $pro->subCategoryId = $request->subCategoryId;
        $pro->brand = $request->brand;

        if($pro->save()){
            $data = Product::latest()->first();
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
    //==============Show
    public function DeleteData(Request $request){
        $pro = new Product();
        $pro->id = $request->id;

        $data = $pro::find($pro->id);

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
    //==============Show
    public function UpdateData(Request $request){
        $pro = new Product();
        $pro->id = $request->id;
        $pro->barcode = $request->barcode;
        $pro->productName = $request->productName;
        $pro->partNumber = $request->partNumber;
        $pro->specifications = $request->specifications;
        $pro->description = $request->description;
        $pro->price = $request->price;
        $pro->discount = $request->discount;
        $pro->warranty = $request->warranty;
        $pro->subCategoryId = $request->subCategoryId;
        $pro->brand = $request->brand;

        $data = $pro::where('id', $pro->id)->update([
            'barcode' => $pro->barcode,
            'productName' => $pro->productName,
            'partNumber' => $pro->partNumber,
            'specifications' => $pro->specifications,
            'description' => $pro->description,
            'price' => $pro->price,
            'discount' => $pro->discount,
            'warranty' => $pro->warranty,
            'subCategoryId' => $pro->subCategoryId,
            'brand' => $pro->brand,
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
