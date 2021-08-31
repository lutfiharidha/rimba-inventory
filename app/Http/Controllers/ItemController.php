<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all()->toArray();
        return array_reverse($items);
    }

    public function store(Request $request)
    {

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('img'), $imageName);


        $item = new Item;
        $item->nama_item = $request->nama_item;
        $item->unit = 'kg';
        $item->stok = 1;
        $item->harga_satuan = 1;
        $item->image = $imageName;
        $item->save();
        // $request['item'] = json_decode($request['item']);
        return response()->json($request);

    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json('Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json('Product deleted!');
    }
}
