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
        $request->image->move(public_path('img/items'), $imageName);


        $item = new Item;
        $item->nama_item = $request->nama_item;
        $item->unit = $request->unit;
        $item->stok = $request->stok;
        $item->harga_satuan = $request->harga_satuan;
        $item->image = $imageName;
        $item->save();
        return response()->json('success');

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
