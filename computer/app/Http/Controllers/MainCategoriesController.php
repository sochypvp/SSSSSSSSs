<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Main_categories;
use Illuminate\Http\Request;

class MainCategoriesController extends Controller
{
    //
    public function ShowMainCate(Request $request){
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
    public function InsertData(Request $request){
        $main = new Main_categories();
        $main->id = $request->id;
        $main->categoryName = $request->categoryName;
        $main->icon = $request->icon;

        if($main->save()){
            $data = Main_categories::latest()->first();
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
}
