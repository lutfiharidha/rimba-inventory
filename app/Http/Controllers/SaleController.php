<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\SaleDetail;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all()->toArray();
        return array_reverse($sales);
    }

    public function store(Request $request)
    {
        $sale = New Sale;
        $saleDetail->code_transaksi = $request->code_transaksi;
        $saleDetail->tanggal_transaksi = $request->tanggal_transaksi;
        $sale->total_bayar = $request->total_bayar;
        $sale->total_diskon = $request->total_diskon;
        $sale->total_harga = $request->total_harga;
        $sale->save();
        $products = $request->product_id;
        foreach ($products as $key => $product) {
            $saleDetail = New SaleDetail;
            $saleDetail->customer_id = $request->customers_id;
            $saleDetail->item_id = $product[$key];
            $saleDetail->sale_id = $sale->id;
            $saleDetail->qty = 2;
            $saleDetail->save();
        }
        return response()->json('Sales Created!');

    }

    public function show($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }

    public function update(Item $item, Request $request)
    {
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('img/items'), $imageName);

        $item->nama_item = $request->nama_item;
        $item->unit = $request->unit;
        $item->stok = $request->stok;
        $item->harga_satuan = $request->harga_satuan;
        // $item->image = $imageName;
        $item->save();

        return response()->json('Product updated!');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json('Product deleted!');
    }
}
