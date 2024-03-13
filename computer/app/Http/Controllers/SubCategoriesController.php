<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Main_categories;
use App\Models\Sub_categories;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function ShowData(Request $request){
        $main = new Sub_categories();

        $data = $main::all();
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
    // =============================Insert
    public function InsertData(Request $request){
        $main = new Sub_categories();
        $main->categoryName = $request->categoryName;
        $main->mainCategoryId = $request->mainCategoryId;
        if($main->save()){
            return redirect()->route('subCateg')->with(['message'=>'alert-success','text'=>'Category was added']);
        }
        return redirect()->route('subCateg')->with(['message'=>'alert-danger','text'=>'something was wrong']);
        // return response($request);
    }
    // =============================Delete
    public function DeleteData(Request $request){
        $main = new Sub_categories();
        $main->id = $request->id;

        $data = Sub_categories::find($main->id);

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
        // return response($request);
    }
    // =============================Update
    public function UpdateData(Request $request){
        $main = new Sub_categories();
        $main->id = $request->id;
        $main->categoryName = $request->categoryName;
        $main->mainCategoryId = $request->mainCategoryId;

        $data = Sub_categories::where('id', $main->id)->update(['categoryName' => $main->categoryName, 'mainCategoryId' => $main->mainCategoryId]);

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
