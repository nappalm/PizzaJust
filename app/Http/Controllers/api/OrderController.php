<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Order_Detail;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Order::latest()->paginate(20);
        $orders = DB::table('order')
        ->join('users','users.id', '=', 'order.user_id')
        ->select('order.id','order.total','order.pizzas','order.created_at','users.name as author')
        ->get();

        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = DB::table('order_detail')
        ->join('pizza','pizza.id', '=', 'order_detail.pizza_id')
        ->select('order_detail.id','order_detail.price','pizza.name_pizza as pizza')
        ->where('order_detail.order_id','=',$id)
        ->get();

        return $orders;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Order_Detail::findOrFail($id);
        $user->delete();
    }
}
