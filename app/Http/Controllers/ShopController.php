<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShopRequest;
use Illuminate\Http\Response;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $shops = Shop::with('user')->latest()->paginate(15);
        return view('admin.shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateShopRequest $request
     * @param Shop $shop
     * @return Response
     */
    public function store(CreateShopRequest $request, Shop $shop)
    {
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
     * @return Response
     */
    public function show(Shop $shop)
    {
        return view('admin.shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return Response
     */
    public function edit(Shop $shop)
    {
        return view('admin.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateShopRequest $request
     * @param \App\Shop $shop
     * @return Response
     */
    public function update(CreateShopRequest $request, Shop $shop)
    {
        $shop->update($request->validated());
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $getData = preg_replace('/ /', '-', $imageName);

            if (!empty($shop->image)) {
                if (file_exists($oldImage = public_path().$shop->image->url)){
                    unlink($oldImage);
                }
                $shop->image()->update(['url'=>$getData]);
            } else {
                $shop->image()->create(['url'=>$getData]);
            }
            $request->image->move(public_path('images'),$getData);
        }
        return redirect()->route('shops.index')->with('successMassage', 'The shop has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Shop $shop
     * @return Response
     * @throws \Exception
     */
    public function destroy(Shop $shop)
    {
        //delete all of price and detach all of the product
        if (!blank($shop->shops)){
            foreach ($shop->products as $product){
                $shop->price()->where('product_id',$product->id)->first()->delete();
            }
            $shop->products()->detach();
        }

        //Delete if there are any images
        if (!empty($shop->image) && file_exists($imageName = public_path().$shop->image->url)) {
            unlink($imageName);
            $shop->image()->delete();
        }

        //Delete the shop now
        $shop->delete();

        //return the response
        return redirect()->route('shops.index')->with('successMassage','The shop has been successfully deleted.');
    }
}
