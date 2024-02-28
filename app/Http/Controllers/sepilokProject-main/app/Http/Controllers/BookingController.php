<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    //
    public function bookingTourist() {
        return view('bookTourist');
    }

    public function viewTouristBook(){

        //making sure that the user is logged in
        $user_ID = Auth::id();

        //the contact data will be retrieved based on the logged in user (eg: abigail logged in and the content of the contact based of abigail's id would be retrieved)
        $booking = Booking::where('user_ID', $user_ID)->latest()->take(1)->get();

        $allbookings = Booking::where('user_ID', $user_ID)->get();

        return view('bookTourist', [
            'booking' => $booking,
            'allbookings' => $allbookings,
        ]);


    }
    // view for Tourist side

    public function bookingStaffget() {
        $booking = Booking::all();
        return view('bookingStaff', ['booking' => $booking]);
    }// view for admin @ staff side

    public function getAvailability($date)
{
    $latestBooking = Booking::where('booking_Date', $date)->latest()->first();

    if ($latestBooking) {
        $availability = $latestBooking->availability;
    } else {
        $availability = 200; // or any default value if there are no bookings on the selected date
    }

    return response()->json(['availability' => $availability]);
}

    //Create new data when user filled and submitted the booking form

    public function bookingTouristPost(Request $request){
        $data = $request->validate([
            'booking_Name' => ['required', 'string'],
            'booking_Contact' => ['required', 'string'],
            'booking_Nationality' => ['required', 'string'],
            'booking_Country' => ['nullable', 'string'],
            'booking_Adults' => ['required', 'integer'],
            'booking_Children' => ['required', 'integer'],
            'booking_Date' => ['required', 'date'],
            'time_slot' => ['required', 'string'],
            'paymentMethod' => ['required', 'string']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input
        $data['booking_Name'] = strip_tags($data['booking_Name']);
        $data['booking_Contact'] = strip_tags($data['booking_Contact']);
        $data['booking_Nationality'] = strip_tags($data['booking_Nationality']);
        $data['booking_Country'] = strip_tags($data['booking_Country']);
        $data['booking_Adults'] = strip_tags($data['booking_Adults']);
        $data['booking_Children'] = strip_tags($data['booking_Children']);
        $data['booking_Date'] = strip_tags($data['booking_Date']);
        $data['time_slot'] = strip_tags($data['time_slot']);
        $data['paymentMethod'] = strip_tags($data['paymentMethod']);

        if($data['booking_Nationality'] == 'malaysian') {
            $data['booking_Country'] == 'Malaysian';
        }

        if($data['booking_Adults'] == 0 && $data['booking_Children'] == 0){
            Alert::warning('Please re-enter the empty input');
            return redirect()->back()->withInput()->withErrors(['error' => 'Both Adults and Children cannot be empty']);
        }

        if($data['booking_Adults'] == 0 && $data['booking_Children'] > 0){
            Alert::warning('Children cannot be witbout adult supervision', 'Please re-enter your Adult input');
            return redirect()->back()->withInput()->withErrors(['error' => 'Both Adults and Children cannot be empty']);
        }

        if($data['booking_Nationality'] == 'malaysian') {
            $totalPrice = ($data['booking_Adults'] * 5) + ($data['booking_Children'] * 2);
        }
        else {
            $totalPrice = ($data['booking_Adults'] * 30) + ($data['booking_Children'] * 15);
        }

        $totalTicket = $data['booking_Adults'] + $data['booking_Children'];



        $data['user_ID'] = auth()->user()->id;
        $data['totalPrice'] = $totalPrice;

        // fetch the latest booking based on the booking_Date
        $latestBooking = Booking::where('booking_Date', $data['booking_Date'])->latest()->first();

        if ($latestBooking) {
            // update the ticket availability based on the previous booking
            $availability = $latestBooking->availability - $totalTicket;
            
            if ($availability <= 0) {
                Alert::warning('Sorry, No Tickets Available', 'Please select another date');
                return redirect()->back()->withInput()->withErrors(['error' => 'No Tickets Available']);
            }
            
            // store the ticket availability with the booking data
            $data['availability'] = $availability;
        } else {

            // initialize the ticket availability if there are no bookings on the selected date
            $data['availability'] = 200 - $totalTicket;
        }
        //insert new booking

        $newBooking = Booking::create($data);
        Alert::success('Booking Added Successfully', 'We Have Added Your Booking');

        return redirect(route('bookTourist.viewTouristBook'));
    }

    public function sendPayment(Request $request) {

        $data = $request->validate([
            'payment_proof' => ['required', 'file', 'mimes:jpeg,png,pdf', 'max:2048'], // Adjust the file validation rules as needed
        ]);
    
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;
            $file->move('paymentProof', $filename);
            $data['payment_proof'] = "paymentProof/$filename";
    
            $data['booking_Status'] = 'pending';
            Alert::success('Payment Proof Is Received');
        } else {
            Alert::error('No Payment Proof Received');
            return redirect()->back()->withInput();
        }
    
        // Assuming you have the booking_ID in the request or session, adjust as needed
        $bookingId = $request->input('booking_ID');
        $booking = Booking::findOrFail($bookingId);
        $booking->update($data);
    
        return redirect(route('bookTourist.viewTouristBook'));
    }

    public function viewPaymentProof(int $booking_ID) {

        $booking = Booking::findOrFail($booking_ID);

        return response()->file($booking->payment_proof);
    }  


    public function editBook(Booking $booking){

        
        return view('editBook', ['booking' => $booking]);
    }

    // Editing the status of the visitor's booking 
    public function updateBooking(Booking $booking, Request $request){
        
        $data = $request->validate([
            'booking_Status' => ['required', 'string']
        ]);

        // to ensure no malicious people can display or store the actual code (html or php) or the input

        $data['booking_Status'] = strip_tags($data['booking_Status']);

        $booking->update($data);

        Alert::success('Status Booking Updated Successfully');

        return redirect(route('bookingStaff'));
    }

    public function deletePost(Booking $booking) {

            $booking->delete();

            return redirect(route('bookingStaff'));
    }

    public function viewInvoice(int $booking_ID) {

        $booking = Booking::findOrFail($booking_ID);
        return view('invoice.invoicePage.generate-invoice', ['booking' => $booking]);
    }

    public function generateInvoice(int $booking_ID){

        $booking = Booking::findOrFail($booking_ID);
        $data = ['booking' => $booking];

        $pdf = Pdf::loadView('invoice.invoicePage.generate-invoice', $data);

        $todayDate = Carbon::now()->format('d-m-Y');

        return $pdf->download('invoice'.$booking->booking_ID.'-'.$todayDate.'.pdf');

    }

   /* public function searchBooking(Request $request) {

        $output="";

        $booking = Booking::where('booking_Name', 'LIKE', '%'.$request->search.'%')
        ->orwhere('booking_IC', 'LIKE', '%'.$request->search.'%')
        ->get();

        foreach($booking as $booking) {

            $output.=

            '<tr>

            <td> '.$booking->booking_ID.' </td>
            <td> '.$booking->booking_Name.' </td>
            <td> '.$booking->booking_Contact.' </td>
            <td> '.$booking->booking_IC.' </td>

            <td> '.$booking->booking_Nationality.' </td>
            <td> '.$booking->booking_Country.' </td>
            <td> '.$booking->booking_Adults.' </td>
            <td> '.$booking->booking_Children.' </td>

            <td> '.$booking->booking_Date.' </td>
            <td> '.$booking->time_slot.' </td>
            <td> '.$booking->booking_Status.' </td>
            <td> '.<a href="{{ route('edit', ['booking' => $booking->booking_ID]) }}" class="btn btn-secondary">Edit</a>                            
            <form action="/delete/{{$booking->booking_ID}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</button>
            </form>.' </td>
            
            

            </tr>';
        }

        return response($output);
    }
    */

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Assuming you have a Pet model and want to filter results
        $booking = Booking::where('booking_Name', 'like', '%' . $searchTerm . '%')
        ->orWhere('booking_Date', 'like', '%' . $searchTerm . '%')
        ->orWhere('booking_Contact', 'like', '%' . $searchTerm . '%')
        ->orWhere('booking_ID', 'like', '%' . $searchTerm . '%')
        ->get();

        return view('bookingStaff', ['booking' => $booking]);
    }

}