<?php

namespace App\Http\Controllers;

use App\Models\socialMedia;
use App\Http\Requests\StoresocialMediaRequest;
use App\Http\Requests\UpdatesocialMediaRequest;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        'hello';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresocialMediaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(socialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(socialMedia $socialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesocialMediaRequest $request, socialMedia $socialMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(socialMedia $socialMedia)
    {
        //
    }
}
