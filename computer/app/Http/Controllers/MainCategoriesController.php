<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Main_categories;
use Illuminate\Http\Request;

class MainCategoriesController extends Controller
{
    //
    public function ShowData(Request $request){
        $main = new Main_categories();

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
    public function addCategory(Request $request){
        $main = new Main_categories();
        $main->categoryName = $request->categoryName;
        $main->icon = $request->icon;

        if($main->save()){
            return redirect()->route('categories')->with(['message'=>'alert-success','text'=>'Category was added']);
        }
        return redirect()->route('categories')->with(['message'=>'alert-danger','text'=>'Something when wrong !!']);
    }
    // =============================Delete
    public function removeCategory(Request $request){

        $data = Main_categories::find($request->id);

        if($data->delete()){
            return redirect()->route('categories')->with(['message'=>'alert-success','text'=>'Category was removed']);
        }
        return redirect()->route('categories')->with(['message'=>'alert-danger','text'=>'Something when wrong !!']);
    }
    // =============================Update
    public function UpdateData(Request $request){
        $main = new Main_categories();
        $main->id = $request->id;
        $main->categoryName = $request->categoryName;
        $main->icon = $request->icon;

        $data = Main_categories::where('id', $main->id)->update([
            'categoryName' => $main->categoryName,
            'icon' => $main->icon,
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
