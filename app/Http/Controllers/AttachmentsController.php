<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use App\Http\Requests\StoreAttachmentsRequest;
use App\Http\Requests\UpdateAttachmentsRequest;

class AttachmentsController extends Controller
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
     * @param  \App\Http\Requests\StoreAttachmentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttachmentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function show(Attachments $attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachments $attachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttachmentsRequest  $request
     * @param  \App\Models\Attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttachmentsRequest $request, Attachments $attachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachments $attachments)
    {
        //
    }
}
