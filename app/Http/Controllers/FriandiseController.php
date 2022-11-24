<?php

namespace App\Http\Controllers;

use App\Models\Friandise;
use App\Http\Requests\StoreFriandiseRequest;
use App\Http\Requests\UpdateFriandiseRequest;

class FriandiseController extends Controller
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
     * @param  \App\Http\Requests\StoreFriandiseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFriandiseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friandise  $friandise
     * @return \Illuminate\Http\Response
     */
    public function show(Friandise $friandise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friandise  $friandise
     * @return \Illuminate\Http\Response
     */
    public function edit(Friandise $friandise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFriandiseRequest  $request
     * @param  \App\Models\Friandise  $friandise
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFriandiseRequest $request, Friandise $friandise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friandise  $friandise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friandise $friandise)
    {
        //
    }
}
