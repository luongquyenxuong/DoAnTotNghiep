<?php

namespace App\Http\Controllers\ADMIN;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\product;
use App\Models\bill;
use App\Models\address;
use App\Models\category;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $acc = User::all()->count();
        $prd = product::all()->count();
        $invoice = bill::all()->count();
        $address = address::all()->count();
        $category = category::all()->count();
        return view('Admin.index', ['account' => $acc, 'product' => $prd,'address'=>$address,'invoice'=>$invoice,'category'=>$category]);
    }
}
