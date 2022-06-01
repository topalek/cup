<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
     public function create(OrderRequest $request){

         $cart_id = $_COOKIE['cart_id'];
         $cart = \Cart::session($cart_id);
         $items = $cart->getContent();
         $prods = [];
         foreach ($items as $item) {
             $prods[$item->id]['count'] = $item->quantity;
         }

         $orderData = $request->validated() + ['status'=> Order::STATUS_NEW];
         $city = $request->get('user_city');
         if ($city == 'rostov'){
            $orderData['city'] = 'Ростов-на-Дону';
         }
         DB::beginTransaction();
         try {
             $order = Order::create($orderData);
             $order->products()->sync($prods, false);
         } catch (\Exception $e) {
             dd($e->getMessage());
             DB::rollBack();
             return back()->with('error','An error occurred');
         }
         DB::commit();
         $cart->clear();

         return redirect()->route('mainpage');
     }

     public function deleteProduct(Order $order, Product $product)
     {
         $order->products()->detach($product);
         return back();
     }

}
