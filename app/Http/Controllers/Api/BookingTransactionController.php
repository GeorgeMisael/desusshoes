<?php

namespace App\Http\Controllers\Api;

use App\Filament\Resources\BookingTransactionResource;
use App\Models\Cosmetic;
use Illuminate\Http\Request;
use App\Models\BookingTransaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingTransactionRequest;
use App\Http\Resources\Api\BookingTransactionApiResource;

class BookingTransactionController extends Controller
{
    //
    public function store(StoreBookingTransactionRequest $request) {
        try{

            $validatedData = $request->validate();

            if($request->hasFile('proof')){
                $filePath = $request->file('proof')->store('proofs', 'public');
                $validatedData['proof'] = $filePath;
            }

            $products = $request->input('cosmetic_ids');
            $totalQuantity = 0;
            $totalPrice = 0;
            
            $cosmeticIds = array_column($products, 'id');
            $cosmetics = Cosmetic::whereIn('id', $cosmeticIds)->get();

            foreach ($products as $product) {
                $cosmetic = $cosmetics->firstWhere('id', $product['id']);
                $totalQuantity += $product['quantity'];
                $totalPrice += $cosmetic->price * $product['quantity'];
            }

            $tax = 0.11 * $totalPrice;
            $grandTotal = $totalPrice + $tax;

            // Populate booking transaction data
            $validatedData['total_amount'] = $grandTotal;
            $validatedData['total_tax_amount'] = $tax;
            $validatedData['sub_total_amount'] = $totalPrice;
            $validatedData['is_paid'] = false;
            $validatedData['booking_trx_id'] = BookingTransaction::generateUniqueTrxId();

            // Save total quantity in booking transactions
            $validatedData['quantity'] = $totalQuantity;

            $bookingTransaction = BookingTransaction::create($validatedData);

            foreach($products as $product){
                $cosmetic = $cosmetics->firstWhere('id', $product['id']);
                $bookingTransaction->transactionDetails()->create([
                    'cosmetic_id' => $product['id'],
                    'quantity' =>$product['quantity'],
                    'price' => $cosmetic->price,
                ]);
            }

            return new BookingTransactionResource($bookingTransaction->load('transactionDetails'));

        }catch(\Exception $e){
            return response()->json(['message' => 'An error occureed', 'error' => $e->getMessage()], 500);
        }
    }

    public function booking_details(Request $request){

        $request->validate([
            'email'=> 'required|string',
            'booking_trx_id' => 'required|string'
        ]);

        $booking = BookingTransaction::where('email', $request->email)
                ->where('booking_trx_id', $request->booking_trx_id)
                ->with([
                    'transactionDetails',
                    'transactionDetails.cosmetic',
                ])
                ->first();
        
        if(!$booking){
            return response()->json([
                'message' => 'Booking not found'
            ], 404);
        }

        return new BookingTransactionApiResource($booking);
    }
}
