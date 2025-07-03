<?php

namespace App\Http\Controllers;

use App\Mail\PaymentConfirmationToUser;
use App\Models\Booking;
use App\Models\ClassPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class BookingController extends Controller
{
    public function checkout(){
        return view('ClientView.checkout');
    }

     public function storeBooking(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        $request->session()->put('booking_data', [
            'name' => $name,
            'email' => $email,

        ]);

        return response()->json(['message' => 'Booking details saved. Proceed to payment.']);
    }

    public function handlepayment(Request $request)
    {
        $user = Auth::user();

        $totalCost = $request->session()->get('totalAmount');
        $bookingData = $request->session()->get('booking_data');
        $cartItems = $request->session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'No services in the cart!');
        }

        try {
            if (isset($request->razorpay_payment_id) && $request->razorpay_payment_id != '') {
                $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
                $payment = $api->payment->fetch($request->razorpay_payment_id);
                $response = $payment->capture(['amount' => $totalCost * 100]);

                $cpIds = [];

                foreach ($cartItems as $item) {
                    $cpIds[] = $item['cp_id'];
                }

                $cpIdsString = implode(',', $cpIds);

                $booking = new Booking();
                $booking->user_id = $user->id;
                $booking->cp_id = $cpIdsString;
                $booking->fullname = $bookingData['name'];
                $booking->email = $bookingData['email'];
                $booking->payment_id = $response['id'];
                $booking->totalprice = $totalCost;
                $booking->save();


                Mail::to($booking->email)->send(new PaymentConfirmationToUser($booking));


                $request->session()->forget(['booking_data', 'cart', 'totalPrice']);

                return redirect('/')->with('success', 'Booking completed successfully!');
            } else {
                return redirect()->back()->with('error', 'Payment failed. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred during payment. Please try again.');
        }
    }
}
