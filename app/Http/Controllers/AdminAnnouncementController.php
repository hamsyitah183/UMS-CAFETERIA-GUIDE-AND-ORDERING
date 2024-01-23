<?php
namespace App\Http\Controllers;





use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class AdminAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = auth()->user()->role;

        $announcement = [];
        
        if($userRole == 'admin') {
            return view('UMS.dashboard.announcement.index', [
            
                'style' => [
                    'admin/adminDashboard',
                    'admin/adminAnnouncement',
                ],
                'type' => 'announcement',
                // 'announcement'=> Announcement::where('user_id', auth()->user()->id)->get(),
                // 'announcement'=> Announcement::where('user_id', auth()->user()->id)->latest()
                // ->filter(request(['announcement'])),
                'announcement'=> Announcement::where('user_id', auth()->user()->id)
                ->latest()->filter(request(['announcement']))->paginate(6)->withQueryString(),

                // 'announcement' => $announcement,
            ]);
        }

        elseif($userRole == 'owner') {
            return view('UMS.dashboard.announcement.index', [
            
                'style' => [
                    'admin/adminDashboard',
                    'admin/adminAnnouncement',
                ],
                'type' => 'announcement',
                // 'announcement'=> Announcement::where('user_id', auth()->user()->id)->get(),
                // 'announcement'=> Announcement::where('user_id', auth()->user()->id)->latest()
                // ->filter(request(['announcement'])),
                'announcement'=> Announcement::latest()->filter(request(['announcement']))->paginate(6)->withQueryString(),
            ]);
        
        }
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
    public function store(Request $request)
    {
        //
       


        $validatedData = $request->validate([
            'title' => 'required|max:255',
            // 'slug' => 'required|unique:announcement',
            'start' => 'required',
            'end' => 'required',
            'place' => 'required',
            'body' => 'required',
            'image' => 'image|file'
        ]);


        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($request->content, 100, '...');
        
        
        // $request->file('image')->store('post-images');

        $slug = SlugService::createSlug(Announcement::class, 'slug', $request->title);
        $validatedData['slug'] = $slug;
        

        // dd($validatedData);

        Announcement::create($validatedData);

        return redirect('/dashboard/announcement')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
        return view('UMS.dashboard.announcement.AdminAnnouncementView', [
            'announcement' => $announcement,
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
    public function edit(Announcement $announcement)
    {
        //
        return view('UMS.dashboard.announcement.AdminAnnouncementEdit', [
            // 'announcement'=> Announcement::where('user_id', auth()->user()->id)->get(),
            'style' => [
                'admin/adminDashboard',
                'admin/adminAnnouncementEdit',
            ],
            'type' => 'announcement',
            'announcement' => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $rules = [
            'title' => 'required|max:255',
            'start' => 'required',
            'end' => 'required',
            'body' => 'required',
            'place'=> 'required'
            // Add other rules as needed
        ];

        // Add slug uniqueness check if slug is present in the request
        if ($request->has('slug') && $request->slug != $announcement->slug) {
            $rules['slug'] = 'required|unique:announcements';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($request->body, 200);

        Announcement::where('id',$announcement->id )
                   ->update($validatedData);

        return redirect('/dashboard/announcement')->with('success', 'Announcement has been updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //

        if($announcement->image) {
            Storage::delete($announcement->image);
        }

        Announcement::destroy($announcement->id);

        return redirect('/dashboard/announcement')->with('delete', 'Post has been deleted');
    }


    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Announcement::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function view()
    {
        
    }
   
}
