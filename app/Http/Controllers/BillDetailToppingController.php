<?php

namespace App\Http\Controllers;

use App\Models\bill_detail_topping;
use App\Http\Requests\Storebill_detail_toppingRequest;
use App\Http\Requests\Updatebill_detail_toppingRequest;

class BillDetailToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storebill_detail_toppingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebill_detail_toppingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bill_detail_topping  $bill_detail_topping
     * @return \Illuminate\Http\Response
     */
    public function show(bill_detail_topping $bill_detail_topping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bill_detail_topping  $bill_detail_topping
     * @return \Illuminate\Http\Response
     */
    public function edit(bill_detail_topping $bill_detail_topping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebill_detail_toppingRequest  $request
     * @param  \App\Models\bill_detail_topping  $bill_detail_topping
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebill_detail_toppingRequest $request, bill_detail_topping $bill_detail_topping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bill_detail_topping  $bill_detail_topping
     * @return \Illuminate\Http\Response
     */
    public function destroy(bill_detail_topping $bill_detail_topping)
    {
        //
    }
}
