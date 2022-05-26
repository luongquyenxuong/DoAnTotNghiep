<?php

namespace App\Http\Controllers;

use App\Models\bill_detail;
use App\Http\Requests\Storebill_detailRequest;
use App\Http\Requests\Updatebill_detailRequest;

class BillDetailController extends Controller
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
     * @param  \App\Http\Requests\Storebill_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebill_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bill_detail  $bill_detail
     * @return \Illuminate\Http\Response
     */
    public function show(bill_detail $bill_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bill_detail  $bill_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(bill_detail $bill_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebill_detailRequest  $request
     * @param  \App\Models\bill_detail  $bill_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebill_detailRequest $request, bill_detail $bill_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bill_detail  $bill_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(bill_detail $bill_detail)
    {
        //
    }
}
