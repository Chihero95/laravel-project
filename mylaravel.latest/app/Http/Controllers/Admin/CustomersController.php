<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('id','desc')->paginate(20);
        return view('admin.customers.index', ['customers'=>$customers]);
    }
    public function search(Request $request){
        $inputData = $request->all();
        $customers = Customer::orderBy('id','desc');
        if(isset($inputData['name']) && $inputData['name'] != ''){
            $customers = $customers->where('name','like','%'.$inputData['name'].'%');
        }
        if(isset($inputData['email']) && $inputData['email'] != ''){
            $customers = $customers->where('email','like','%'.$inputData['email'].'%');
        }
        if(isset($inputData['phone']) && $inputData['phone'] != ''){
            $customers = $customers->where('phone','like','%'.$inputData['phone'].'%');
        }
        $customers = $customers->paginate(20);
        return view('admin.customers.index', ['customers'=>$customers]);

    }

    public function delete($id){
        $customer = Customer::find($id)->delete();
        return redirect()->route('admin.customer');
    }
}
