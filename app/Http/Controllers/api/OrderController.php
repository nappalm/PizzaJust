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
        $this->validate($request, [
            'iduser' => 'required',
            'total' => 'required',
            'pizzas' => 'required',
            'listPizza' => 'required|array'
        ]);

        DB::beginTransaction();
        $order = Order::create([
            'user_id' => $request['iduser'],
            'total' => $request['total'],
            'pizzas' => $request['pizzas'],
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'updated_at' => date('Y-m-d H:i:s')
        ]);

        $listPizzas = $request['listPizza'];
        $countListPizzas = count($listPizzas);
        for($i = 0; $i < $countListPizzas; $i ++){
            $order_detail = Order_Detail::create([
                'order_id' => $order->id,
                'pizza_id' => $listPizzas[$i]['id'],
                'price' => $listPizzas[$i]['price'],
                // 'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        if($order && $order_detail){
            DB::commit();
            return ['message' => 'Se ha creado tu nueva order','order_id' => $order_detail->id];
        } else {
            DB::rollBack();
            return ['message' => 'Se ha presetado un problema al crear tu orden'];
        }

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
