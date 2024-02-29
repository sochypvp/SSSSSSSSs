<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\pdImg\imgResource;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getData(Request $request){
        $data = Product::all();

        if(!$data){
            return response([
                'message' => 'Record not found',
                'status' => false,
            ]);
        }

        return response([
            'message' => 'Record founded',
            'status' => true,
            'data' => $data,
        ]);
    }
    //
    public function addProduct(Request $request){
        // dd($request->request);
        // // $request->validate([
        // //     'name' => 'require',
        // //     'phone' => 'require',
        // // ]);
        $requestData = [
            'barcode' => $request->barcode,
            'productName' => $request->productName,
            'partNumber' => $request->partNumber,
            'specifications' => $request->specifications,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'warranty' => $request->warranty,
            'subCategoryId' => $request->subCategoryId,
            'brand' => $request->brand,
        ];

        $data = Product::create($requestData);

        if($data){
            // return response([
            //     'message' => 'it is Work',
            //     'status' => true,
            //     'data' => $data,
            // ]);
            $image = $request->file('image');
            if($image){
                $path = $image->store('images');
                $check = ProductImages::create(['mainImage'=>$path,'productId'=>$data->id]);
                if($check){
                    return redirect()->route('product');
                }
                else{
                    $dataDelete = Product::find($data->id);
                    $dataDelete->delete();
                    return response([
                        'message' => 'Error',
                        'status' => false,
                        'data' => $data,
                    ]);
                }
            }

        }
        return response([
            'message' => 'Error',
            'status' => false,
            'data' => $data,
        ]);

    }
    public function productJoinSubCateg(){
        $pro = Product::join('sub_categories','products.subCategoryId','sub_categories.id')
                ->select('sub_categories.id','products.productName')
                ->get();
        return response($pro);
    }
    //
    public function deleteData(Request $request){

        // $request->validate([
        //     'id' => 'require',
        // ]);

        $data = new Product();
        $data->id = $request->id;

        $data = Product::find($data->id);

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
    //
    public function updateData(Request $request){

        // $request->validate([
        //     'id' => 'require',
        //     'name' => 'require',
        //     'phone' => 'require',
        // ]);

        $data = new Product();
        $data->id = $request->id;
        $data->name = $request->name;
        $data->phone = $request->phone;

        $data = Product::where('id', $data->id)->update(['name' => $data->name, 'phone' => $data->phone]);

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
    public function getProductImage(){
        $data = Product::find(1);
        return response(new imgResource($data));
    }
}
