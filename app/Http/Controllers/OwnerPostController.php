<?php

namespace App\Http\Controllers;

use App\Models\OwnerPost;
use App\Models\FoodOption;
use App\Http\Requests\StoreOwnerPostRequest;
use App\Http\Requests\UpdateOwnerPostRequest;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Tests\Models\Post;

class OwnerPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $owner = Auth()->user();
        $foodOption = FoodOption::where('owner_id', $owner->id)->first();
        if($owner->role == 'owner') {
            $announcement = OwnerPost::latest()->where('place_id', $foodOption->id )->get();
        }
        else {
            $announcement = OwnerPost::all();
        }
        return view('UMS.dashboard.post.userPost', [
            'announcement' => $announcement,
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncement',
            ],
            'type' => 'Post'
        ]);
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
                return view('UMS.dashboard.post.userPostAdd', [
                    'type' => 'Post',
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
                return redirect('dashboard/post');
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $owner = Auth()->user();
        $foodOption = FoodOption::where('owner_id', $owner->id)->first();

        $validatedData = $request->validate([
            'image' => 'file|image',
            'title' => 'required',
            'category' => 'required',
            'content' => 'required', // Corrected validation rule
        ]);

        
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
            $created['image'] = $validatedData['image'];
        }
        
        $created['place_id'] = $foodOption->id;
        $created['title'] = $validatedData['title'];

        $created['category'] = $validatedData['category'];
        $created['content'] = $validatedData['content'];
        $created['status'] = 'Ongoing';

        
        OwnerPost::create($created);

        return redirect('/dashboard/post')->with('success', 'New post has been added');

    }   

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        
        $ownerPost = OwnerPost::where('id', $id)->first();


        return view('UMS.dashboard.post.UserPostView', [

            'announcement' => $ownerPost,
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncementView',
            ],
            'type' => 'announcement'
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OwnerPost $ownerPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOwnerPostRequest $request, OwnerPost $ownerPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OwnerPost $ownerPost)
    {
        //
    }
}
