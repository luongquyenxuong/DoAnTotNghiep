<?php

namespace App\Http\Controllers\ADMIN;
use App\Http\Controllers\Controller;

use App\Models\table;
use App\Http\Requests\StoretableRequest;
use App\Http\Requests\UpdatetableRequest;

class TableController extends Controller
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
     * @param  \App\Http\Requests\StoretableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetableRequest  $request
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetableRequest $request, table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(table $table)
    {
        //
    }
}
