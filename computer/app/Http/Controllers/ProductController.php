<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\pdImg\imgResource;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use App\Models\Main_categories;
use App\Models\Brand;
use App\Models\Sub_categories;


class ProductController extends Controller
{
    public function getData(Request $request)
    {
        $data = Product::all();

        if (!$data) {
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
    public function addProduct(Request $request)
    {
        $request->validate([
            'barcode' => 'required',
            'productName' => 'required',
            'partNumber' => 'required',
            'price' => 'required',
            'subCategoryId' => 'required',
            'brand' => 'required'
        ]);
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

        $image = explode('|', $request->image);
        $pdtImg = [];

        foreach ($image as $s) {
            array_push($pdtImg, new ProductImages(['imageUrl' => $s]));
        }
        $data->productImg()->saveMany($pdtImg);

        if ($data) {
            return redirect()->route('product')->with(['message'=>'alert-success','text'=>'Product was added']);
        }

        return redirect()->route('product')->with(['message'=>'alert-danger','text'=>'Something when wrong !!']);
    }
    public function productJoinSubCateg()
    {
        $pro = Product::join('sub_categories', 'products.subCategoryId', 'sub_categories.id')
            ->select('sub_categories.id', 'products.productName')
            ->get();
        return response($pro);
    }
    //
    public function deleteData(Request $request)
    {
        $data = new Product();
        $data->id = $request->id;

        $data = Product::find($data->id);

        if ($data->delete()) {
            // return response([
            //     'message' => 'Record deleted successfully',
            //     'status' => true,
            // ]);
            return redirect()->route('product');
        }
        return response([
            'message' => 'Error deleting record',
            'status' => false,
        ]);
    }
    //
    public function updateData(Request $request)
    {

        $request->validate([
            'barcode' => 'required',
            'productName' => 'required',
            'partNumber' => 'required',
            'price' => 'required',
            'subCategoryId' => 'required',
            'brand' => 'required'
        ]);
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

        $data = Product::find($request->id);
        $data->update($requestData);
        $data->refresh();

        $image = explode('|', $request->image);
        $pdtImg = [];

        foreach ($image as $s) {
            array_push($pdtImg, new ProductImages(['imageUrl' => $s]));
        }

        ProductImages::where('productId',$request->id)->delete();
        $data->productImg()->saveMany($pdtImg);

        if ($data) {
            return redirect()->route('product')->with(['message'=>'alert-success','text'=>'Product was added']);
        }

        return redirect()->route('product')->with(['message'=>'alert-danger','text'=>'Something when wrong !!']);

    }
    public function getProductImage()
    {
        $data = Product::all();
        $s =  imgResource::collection($data);
        return json_decode(json_encode($s, true));
    }

    public function productFilter(Request $request)
    {
        $product = null;
        if ($request->searchMainCategory == 0 && $request->searchSubCategory == 0 && $request->brand == 0) {
            $product = Product::all();
        }
        elseif($request->searchMainCategory == 0 && $request->searchSubCategory == 0 && $request->brand != 0) {
            $product = Product::join('brands','products.brand','brands.id')
                ->where(['products.brand' => $request->brand])
                ->select('products.*')
                ->get();
        }
        elseif($request->searchMainCategory == 0 && $request->searchSubCategory != 0){
            $condition = ['sub_categories.id' => $request->searchSubCategory];
            if($request->brand != 0){
                $condition = [
                    'sub_categories.id' => $request->searchSubCategory,
                    'products.brand' => $request->brand
                ];
            }

            $product = Product::join('sub_categories', 'products.subCategoryId', 'sub_categories.id')
                ->join('main_categories', 'sub_categories.mainCategoryId', 'main_categories.id')
                ->join('brands','products.brand','brands.id')
                ->where($condition)
                ->select('products.*')
                ->get();
        }
        elseif($request->searchMainCategory != 0 && $request->searchSubCategory == 0){
            $condition = ['sub_categories.id' => $request->searchMainCategory];
            if($request->brand != 0){
                $condition = [
                    'sub_categories.id' => $request->searchMainCategory,
                    'products.brand' => $request->brand
                ];
            }
            $product = Product::join('sub_categories', 'products.subCategoryId', 'sub_categories.id')
                ->join('main_categories', 'sub_categories.mainCategoryId', 'main_categories.id')
                ->join('brands','products.brand','brands.id')
                ->where($condition)
                ->select('products.*')
                ->get();
        }
        elseif($request->searchMainCategory != 0 && $request->searchSubCategory != 0){
            $condition = ['sub_categories.id' => $request->searchSubCategory];
            if($request->brand != 0){
                $condition = [
                    'sub_categories.id' => $request->searchSubCategory,
                    'products.brand' => $request->brand
                ];
            }

            $product = Product::join('sub_categories', 'products.subCategoryId', 'sub_categories.id')
                ->join('main_categories', 'sub_categories.mainCategoryId', 'main_categories.id')
                ->join('brands','products.brand','brands.id')
                ->where($condition)
                ->select('products.*')
                ->get();
        }

        $s =  imgResource::collection($product);
        // return response(json_encode($s));
        return redirect()->route('product')->with('productsSearched',$s)->withInput();
    }
}
