<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InventoryController extends Controller
{
    //
    public function invStaff() {
        return view('inventory');
    }

    //create new data to database when user submits the inventory information
    public function invPost(Request $request){
        $data = $request->validate([
            'invName' => ['required', 'string'],
            'invDesc' => ['required', 'string'],
            'invQuant' => ['required', 'integer'],
            'invCategory' => ['required', 'string']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['invName'] = strip_tags($data['invName']);
        $data['invDesc'] = strip_tags($data['invDesc']);
        $data['invQuant'] = strip_tags($data['invQuant']);
        $data['invCategory'] = strip_tags($data['invCategory']);

        $data['user_ID'] = auth()->user()->id;

        $newInv = Inventory::create($data);

        Alert::success('Inventory Added Successfully');

        return redirect(route('inventory.invPost'));
    }

    //Display the inventory data from database
    public function invGet() {

        $inventory = Inventory::all(); 

        //the view would get the data from the inventory table where the $inventory is passed to the inventory blade view to display them
        return view('inventory', ['inventory' => $inventory]);
    }

    // to display the edtiInventory blade view
    public function editInventory(Inventory $inventory){
        
        return view('editInv', ['inventory' => $inventory]);
    }

    public function updateInv(Inventory $inventory, Request $request){
        $data = $request->validate([
            'invName' => ['required', 'string'],
            'invDesc' => ['required', 'string'],
            'invQuant' => ['required', 'integer'],
            'quantityChange' => ['required', 'in:add,subtract'],
            'invCategory' => ['required', 'string']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['invName'] = strip_tags($data['invName']);
        $data['invDesc'] = strip_tags($data['invDesc']);
        $data['invQuant'] = strip_tags($data['invQuant']);
        $data['invCategory'] = strip_tags($data['invCategory']);

        // Adjust invQuant based on the selected action
    if ($data['quantityChange'] === 'subtract') {
        $data['invQuant'] = -$data['invQuant'];
    }

    $inventory->update([
        'invName' => $data['invName'],
        'invDesc' => $data['invDesc'],
        'invQuant' => $inventory->invQuant + $data['invQuant'], // Update based on the selected action
        'invCategory' => $data['invCategory'],
    ]);

        Alert::success('Inventory Updated Successfully');

        return redirect(route('inventory.invGet'));
    }

    public function deleteInv(Inventory $inventory) {

        $inventory->delete();

        return redirect(route('inventory.invGet'));

    }

}
