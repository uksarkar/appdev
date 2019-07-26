<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShopRequest;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::with('user')->latest()->paginate(15);
        return view('admin.shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\CreateShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateShopRequest $request, Shop $shop)
    {
        // dd($request->validated());
        $getData = $request->validated();
        $getData['user_id'] = auth()->user()->id;
        $shop = $shop->create($getData);
        if($request->hasFile('image')){
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $imageName = preg_replace('/ /','-', $imageName);
            $request->image->move(public_path('images'), $imageName);
            $shop->image()->create(['url'=>$imageName]);
        }

        return redirect()->route('shops.index')->with('successMassage', 'Shop was successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('admin.shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('admin.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
