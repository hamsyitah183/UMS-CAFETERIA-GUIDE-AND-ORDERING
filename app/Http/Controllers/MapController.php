<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\FoodOption;
use App\Http\Requests\StoreMapRequest;
use App\Http\Requests\UpdateMapRequest;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $places = FoodOption::latest()->get();
    //     $cafeterias = $places->where('type', 1);
    //     $kiosks = $places->where('type', 2);
    //     $vendors = $places->where('type', 3);

    //     // $cafeteriaLength = $cafeteria.count();
    //     $cafeteriaSlug = $places->where('type', 1)->pluck('place_slug');
    //     $cafeteriaName = $places->where('type', 1)->pluck('place_name');

    //     $cafeteriaMap = [];

    //     foreach ($cafeterias as $cafeteria) {
    //         $cafeteriaMap[] = $cafeteria->map;
    //     }

    //     $cafeteriaLatitude = [];

    //     foreach ($cafeteriaMap as $map) {
    //         if ($map === null || $map->latitude === null) {
    //             $cafeteriaLatitude[] = 0;
    //         } else {
    //             $cafeteriaLatitude[] = $map->latitude;
    //         }
                

    //     }

    //     $cafeteriaLongitude = [];

    //     foreach ($cafeteriaMap as $map) {
    //         if ($map === null || $map->longitude === null) {
    //             $cafeteriaLongitude[] = 0;
    //         } else {
    //             $cafeteriaLongitude[] = $map->longitude;
    //         }


    //     }

    //     // kiosk

    //     // $cafeteriaLength = $cafeteria.count();
    //     $kioskSlug = $places->where('type', 2)->pluck('place_slug');
    //     $kioskName = $places->where('type', 2)->pluck('place_name');

    //     $kioskMap = [];

    //     foreach ($kiosks as $kiosk) {
    //         $kioskMap[] = $kiosk->map;
    //     }

    //     $kioskLatitude = [];

    //     foreach ($kioskMap as $map) {
    //         if ($map === null || $map->latitude === null) {
    //             $kioskLatitude[] = 0;
    //         } else {
    //             $kioskLatitude[] = $map->latitude;
    //         }
                

    //     }

    //     $kioskLongitude = [];

    //     foreach ($kioskMap as $map) {
    //         if ($map === null || $map->longitude === null) {
    //             $kioskLongitude[] = 0;
    //         } else {
    //             $kioskLongitude[] = $map->longitude;
    //         }


    //     }

        

    //     return view('UMS.mapVenue', [
    //         'style' => [
    //             'UMS/wajib',
    //             'UMS/mapVenue'
    //         ],
    //         'places' => $places,
    //         'cafeteria' => $cafeterias,
    //         'kiosks' => $kiosks,
    //         'vendors' => $vendors,

    //         'cafeteriaLongitude' => $cafeteriaLongitude,
    //         'cafeteriaLatitude' => $cafeteriaLatitude,
    //         'cafeteriaSlug' => $cafeteriaSlug,
    //         'cafeteriaName' => $cafeteriaName,

    //         'kioskLongitude' => $kioskLongitude,
    //         'kioskLatitude' => $kioskLatitude,
    //         'kioskSlug' => $kioskSlug,
    //         'kioskName' => $kioskName,

    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */


    public function index() {
        $places = FoodOption::latest()->get();
        $map = Map::latest()->get();
        
        return view('UMS.mapVenue2', [
            'style' => [
                'UMS/wajib',
                'UMS/mapVenue'
            ],
            
            'map' => $map
        ]);

    }

    public function map(FoodOption $foodOption) {
        $place = FoodOption::where('id', $foodOption->id)->first();
        return view('UMS.individualMap', [
            'style' => [
                'UMS/wajib',
                'UMS/individualMap'
            ],
            'type' => 'Map',
            'foodOption' => $place,

        ]);
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Map $map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMapRequest $request, Map $map)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {
        //
    }
}
