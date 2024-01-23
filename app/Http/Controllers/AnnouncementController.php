<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $announcement = Announcement::latest()->paginate(6);
        return view('UMS/announcement', [
            'type' => 'Announcement',
            'active' => 'about',
            'title' => 'About',
            'style' => [
                'UMS/wajib',
                'UMS/homepage',
                'UMS/announcement'
            ],
            'announcements' => $announcement,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function individual(Announcement $announcement)
    {
        //
        return view('UMS.announcementView', [
            'type' => 'Announcement',
            'active' => 'about',
            'title' => 'About',
            'style' => [
                'UMS/wajib',
                'UMS/homepage',
                'UMS/announcementIndividual'
            ],
            'announcement' => $announcement,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
