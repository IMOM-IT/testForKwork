<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order()
    {
        $ids = [1, 2];
        DB::beginTransaction();
        try {
            $order = Order::query()->create(['name' => 'test', 'user_id' => 1, 'delivery_address' => 'test', 'total_amount' => 0]);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;

        }
        $product = DB::table('order_products')->insert(['product_id' => 1, 'order_id' => $order->id, 'amount' => 1, 'price' => 1000]);
        //then update the total amount but i do it in hour
        Order::query()->where('id', $order->id)->update(['total_amount' => '0']);
        $orders = Order::query()->with('products')->get();
        return $orders;
    }

    public function delete()
    {
        /** @var Order $order */
        $order = Order::query()->where('id', '=', 1)->delete();
        dd(DB::table('order_products')->get());
    }
}
