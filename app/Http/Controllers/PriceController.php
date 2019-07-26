<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePriceRequest;
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
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}
