<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index', [
            "user" => Auth::user(),
            "orders" => Auth::user()->order
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {   
        $validated = [
            "user_id" => Auth::user()->id,
            "order_date" => Carbon::now()
        ];
        
        $order = Order::create($validated);
        
        foreach (Auth::user()->cart as $cart) {
            foreach ($cart->book as $book) {
                Book::findOrFail($book->id)->update(['cart_id' => null, 'order_id' => $order->id]);
            }
            $cart->delete();
        }
        
        return redirect('/order')->with('success', 'Book succesfully Ordered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(Auth::user()->role != 'admin') {
            if (Auth::user()->id != $order->user_id) {
                abort('401', 'This Action is Unauthorized');
            }
        }
        return view('order.show', [
            "books" => $order->book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if(Auth::user()->role != 'admin') {
            if (Auth::user()->id != $order->user_id) {
                abort('401', 'This Action is Unauthorized');
            }
        }
        Book::where('order_id', '=', $order->id)->update(['order_id' => null]);
        $order->delete();
        return redirect()->back()->with('success', 'Order successfully deleted');
    }
}
