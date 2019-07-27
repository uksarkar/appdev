<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePriceRequest;
use App\Http\Requests\PriceUpdateRequest;
use App\Price;
use App\Product;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePriceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePriceRequest $request)
    {
        $data = $request->validated();
        $data['shop_id'] = $request->shop;
        $data['product_id'] = $request->product;
        $product = Product::findOrFail($request->product);
        $product->shops()->attach($request->shop);
        Price::create($data);

        return back()->with('successMassage','Product was successfully added.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(PriceUpdateRequest $request, Price $price)
    {
        $price->update($request->all());

        return back()->with('successMessage','Price was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $product = $price->product;
        $shop = $price->shop;
        $product->shops()->detach($shop);
        $price->delete();

        return back()->with('successMessage','Product was removed.');
    }
}
