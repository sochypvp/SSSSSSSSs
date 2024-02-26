<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\customer_user;
use Illuminate\Http\Request;

class cusUserController extends Controller
{
    //
    public function userInsert(Request $request){
        $cus = new Customer_user();
        $cus->id = $request->id;
        $cus->username = $request->username;
        $cus->password = $request->password;
        $cus->save();

        return response($cus);
    }

    public function userDelete(Request $request, $id){
        $cus = new Customer_user();
        // $cus->id = $request->id;
        $deleteUser = $cus::find($id);
        $deleteUser->delete();

    }

}
