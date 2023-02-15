<?php

namespace App\Http\Controllers;

use App\Models\sale;
use App\Http\Controllers\Controller;
use App\Models\SoldProduct;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $sales = Sale::all();
        return view('Petworks.admin.inventory.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            sale::create(
                [
                    'product_name' => $request->input('product_name'),
                    'brand_name' => $request->input('brand_name'),
                    'category_id' => $request->input('category_id'),
                    'date' => $request->input('date'),
                    'price' => $request->input('price'),
                    'stock' => $request->input('stock'),
                    'sold' => $request->input('sold'),
                    'remain' => $request->input('remain'),
                    'sale' => $request->input('sale'),
                ]
            );

            toast()->success('Success', 'You added a new record')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast()->warning('Info', 'You did not input any record ' . $th->getMessage())->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = SoldProduct::where('product_id', '=', $id)->get();
        return view('Petworks.admin.inventory.sales.show', compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sales = Sale::findOrFail($id);
        $sales->update(
            [
                'product_name' => $request->input('product_name'),
                'brand_name' => $request->input('brand_name'),
                'category_id' => $request->input('category_id'),
                'date' => $request->input('date'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'sold' => $request->input('sold'),
                'remain' => $request->input('remain'),
                'sale' => $request->input('sale'),
            ]
        );
        if ($sales->wasChanged()) {
            toast()->success('Success', 'You saved changes')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
            return redirect()->back();
        }
        toast()->info('Info', 'There is no changes')->autoClose(3000)->animation('animate__fadeInRight', 'animate__fadeOutRight')->width('400px');
        return redirect()->route('admin.sale.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(sale $sale)
    {
        //
    }
}
