<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
<<<<<<< HEAD:computer/app/Http/Controllers/SubCategoriesController.php
use App\Models\Main_categories;
use App\Models\Sub_categories;
=======
use App\Models\Brand;
>>>>>>> chai:computer/app/Http/Controllers/BrandController.php
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
<<<<<<< HEAD:computer/app/Http/Controllers/SubCategoriesController.php
        $main = new Sub_categories();
        $main->categoryName = $request->categoryName;
        $main->mainCategoryId = $request->mainCategoryId;
        if($main->save()){
            return redirect()->route('subCateg')->with(['message'=>'alert-success','text'=>'Category was added']);
        }
        return redirect()->route('subCateg')->with(['message'=>'alert-danger','text'=>'something was wrong']);
        // return response($request);
=======
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
>>>>>>> chai:computer/app/Http/Controllers/BrandController.php
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

    public function getSubCategByMainCateg(Request $request){
        if($request->mainCategoryId == 0) return response(Sub_categories::all());
        $d = Main_categories::find($request->mainCategoryId);
        $s = $d->subCategories()->get();
        return response($s);
    }
}
