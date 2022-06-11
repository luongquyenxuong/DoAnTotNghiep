<?php

namespace App\Http\Controllers\ADMIN;
use App\Http\Controllers\Controller;

use App\Models\user_discount;
use App\Http\Requests\Storeuser_discountRequest;
use App\Http\Requests\Updateuser_discountRequest;

class UserDiscountController extends Controller
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
     * @param  \App\Http\Requests\Storeuser_discountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_discountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_discount  $user_discount
     * @return \Illuminate\Http\Response
     */
    public function show(user_discount $user_discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_discount  $user_discount
     * @return \Illuminate\Http\Response
     */
    public function edit(user_discount $user_discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_discountRequest  $request
     * @param  \App\Models\user_discount  $user_discount
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_discountRequest $request, user_discount $user_discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_discount  $user_discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_discount $user_discount)
    {
        //
    }
}
