<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\FoodOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OwnerMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
        if($place_id) {
            $category = Menu::latest()->where('place_id', $place_id);
            return view('UMS.dashboard.menu.OwnerViewMenu', [
                'type' => 'menu',
                'style' => [
                    'admin/adminDashboard',
                    'owner/ownerDashboard',
                    'owner/owner',
                    'owner/ownerMenu',
                    'owner/ownerMenuView'
                ],
                'category' => $category,
                'category2' => $category,
            
            ]);
        }
        else {
            return redirect('/dashboard/foodOption');
        }
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('UMS.dashboard.menu.OwnerMenuAdd', [
            'type'=>'menu',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'owner/ownerMenu',
                'admin/adminAnnouncement',
                'admin/adminCustomer',
                'owner/ownerMenuList'
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'file|image'
        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Menu::create($validatedData);

        return redirect('dashboard/menu/list/all')->with('success', 'A menu is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
        return view('UMS.dashboard.menu.OwnerViewMenuDetails', [
            'type' => 'menu',
            'style' => [
                'admin/adminDashboard',
                // 'owner/ownerDashboard',
                'owner/ownerViewMenuDetails'
            ],
            'menu' => $menu,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //

        return view('UMS.dashboard.menu.OwnerMenuEdit', [
            'type'=>'menu',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'owner/ownerMenu',
                'admin/adminAnnouncement',
                'admin/adminCustomer',
                'owner/ownerMenuList',
                
            ],
            'menu' => $menu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
       
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'status' => 'required',
            'description' => 'required',
            // 'image' => 'required'
        ]);

        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');

        $validatedData['place_id'] = $place_id;

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

       

        Menu::where('id', $menu->id)->update($validatedData);
        return redirect('dashboard/menu/'. $menu->id)->with('success', 'A menu is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
        if($menu->image) {
            Storage::delete($menu->image);
        }

        Menu::destroy($menu->id);

        return redirect('/dashboard/menu')->with('delete', 'Post has been deleted');
    }

    public function category(Menu $category)
    {
        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
        $category = Menu::latest()->where('place_id', $place_id)->get();
        return view('UMS.dashboard.menu.OwnerViewMenu', [
            'type' => 'menu',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'owner/owner',
                'owner/ownerMenu',
                'owner/ownerMenuView'
            ],
            'category' => $category,
            
        ]);
    }

    public function list(Menu $category)
    {
        $place_id = FoodOption::where('owner_id', auth()->user()->id)->value('id');
        $category = Menu::latest()->where('place_id', $place_id)->get();
        // $category = Menu::latest()->where('place_id', $place_id);
        // $category = Menu::latest()->where('place_id', $place_id);


        return view('UMS.dashboard.menu.OwnerMenuList', [
            'type' => 'menu',
            'style' => [
                'admin/adminDashboard',
                'owner/ownerDashboard',
                'owner/owner',
                'owner/ownerMenu',
                'admin/adminAnnouncement',
                'admin/adminCustomer',
                'owner/ownerMenuList',
            ],
            'category' => $category,
            'place_id' => $place_id,
            
           
        ]);
    }
}
