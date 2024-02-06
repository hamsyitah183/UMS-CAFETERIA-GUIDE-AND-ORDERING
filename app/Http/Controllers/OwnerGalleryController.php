<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\FoodOption;
use Illuminate\Http\Request;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Storage;

class OwnerGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
            // $id = auth()->user()->id;

            $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
            if($place_id) {
                $galleries = Gallery::all()->where('place_id', $place_id);
                return view('UMS.dashboard.gallery.OwnerGallery', [
                    'type' => 'gallery',
                    'style' => [
                        'admin/adminDashboard',
                        'owner/ownerDashboard',
                        'owner/owner',
                        'owner/ownerMenu',
                        'owner/ownerGallery'
                    ],
                    
                    'galleries' => $galleries
                ]);
            }
            else {
                return redirect('dashboard/foodOption');
            }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
            if($place_id) {
                // $galleries = Gallery::all()->where('place_id', $place_id);
                return view('UMS.dashboard.gallery.OwnerGalleryAdd', [
                    'type' => 'announcement',
                    'style' => [
                        'admin/adminDashboard',
                        'owner/ownerDashboard',
                        'owner/owner',
                        'owner/ownerMenu',
                        'owner/ownerGallery'
                    ],
                    
                    
                ]);
            }
            else {
                return redirect('dashboard/gallery');
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'image|file'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;

        Gallery::create($validatedData);

        return redirect('/dashboard/gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
        return view ('UMS.dashboard.gallery.OwnerGalleryView', [
            'type' => 'gallery',
            'style' => [
                // 'admin/adminDashboard',
                'owner/ownerDashboard',
                'owner/ownerViewMenuDetails'
            ],
            'gallery' => $gallery

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
        return view ('UMS.dashboard.gallery.OwnerGalleryEdit', [
            'type' => 'gallery',
            'style' => [
                'admin/adminDashboard',
                
                'owner/ownerMenu',
                'owner/ownerGallery'
            ],
            'gallery' => $gallery

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'image|file'
        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Gallery::where('id', $gallery->id)->update($validatedData);
        return redirect('dashboard/gallery')->with('success', 'A menu is updated');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
        if($gallery->image) {
            Storage::delete($gallery->image);
        }

        Gallery::destroy($gallery->id);

        return redirect('/dashboard/gallery')->with('delete', 'Post has been deleted');
    }
}
