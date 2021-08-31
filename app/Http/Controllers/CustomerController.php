<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
       public function index()
    {
        $customers = Customer::all()->toArray();
        return array_reverse($customers);
    }

    public function store(Request $request)
    {

        $imageName = time().'.'.$request->ktp->getClientOriginalExtension();
        $request->ktp->move(public_path('img/customers'), $imageName);


        $customer = new Customer;
        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->kontak = $request->kontak;
        $customer->email = $request->email;
        $customer->diskon = $request->diskon;
        $customer->tipe_diskon = $request->tipe_diskon;
        $customer->ktp = $imageName;
        $customer->save();
        return response()->json('success');

    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function update(Customer $customer, Request $request)
    {
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('img/customers'), $imageName);

        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->kontak = $request->kontak;
        $customer->email = $request->email;
        $customer->diskon = $request->diskon;
        $customer->tipe_diskon = $request->tipe_diskon;
        // $customer->ktp = $imageName;
        $customer->save();

        return response()->json('Product updated!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json('Product deleted!');
    }
}
