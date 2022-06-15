<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productgr;
use App\Models\SEO;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function basket()
    {
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $data['cont'] = SEO::where('page', 'contacts')->first();
        $data['page'] = SEO::where('page', 'basket')->first();

        $cart_id = null;
        $cartItems = null;
        $cart_id_w = null;
        $data['basket'] = 0;

        if (isset($_COOKIE['cart_id'])) {
            $cart_id = $_COOKIE['cart_id'];
            $cartItems = \Cart::session($cart_id)->getContent();
            $cart_id_w = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
            $data['basket'] = $cart_id_w;
        }
        return view('basket', $data, compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $pr = $request->pr;
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        if ($pr == 'product') {
            $product = Product::where('id', $request->id)->first();
            $idprod = $product->id;

            $imageres = '';
            $imagesalt = '';
            $image2 = $product->attachment()->get();
            if ($image2 != null) {
                if (isset($image2[0])) {
                    $imageres = $image2[0]['url'];
                    $imagesalt = $image2[0]['alt'];
                };
            };
            \Cart::add([
                'id'         => $idprod,
                'name'       => $product->name,
                'price'      => $product->price_full,
                'quantity'   => (int)$product->countpr,
                'attributes' => [
                    'id'     => $product->id,
                    'pr'     => 'product',
                    'img'    => $imageres,
                    'imgalt' => $imagesalt,
                    'weight' => $product->weight_full,
                ]
            ]);
            $cart_id_w = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
            $data['basket'] = $cart_id_w;
            return response()->json(\Cart::getContent());
        } else {
            $productgr = Productgr::where('id', $request->id)->first();
            foreach ($productgr->products as $itemel) {
                $product2 = Product::where('id', $itemel->id)->first();
                $idprod2 = $product2->id;


                $imageres = '';
                $imagesalt = '';
                $image2 = $product2->attachment()->get();
                if ($image2 != null) {
                    if (isset($image2[0])) {
                        $imageres = $image2[0]['url'];
                        $imagesalt = $image2[0]['alt'];
                    };
                };
                \Cart::add([
                    'id'         => $idprod2,
                    'name'       => $product2->name,
                    'price'      => $product2->price_full,
                    'quantity'   => (int)$product2->countpr,
                    'attributes' => [
                        'id'     => $product2->id,
                        'pr'     => 'product',
                        'img'    => $imageres,
                        'imgalt' => $imagesalt,
                        'weight' => $product2->weight_full,
                    ]
                ]);
                $cart_id_w = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
                $data['basket'] = $cart_id_w;
            };
            foreach ($productgr->products2 as $itemel) {
                $product2 = Product::where('id', $itemel->id)->first();
                $idprod2 = $product2->id;


                $imageres = '';
                $imagesalt = '';
                $image2 = $product2->attachment()->get();
                if ($image2 != null) {
                    if (isset($image2[0])) {
                        $imageres = $image2[0]['url'];
                        $imagesalt = $image2[0]['alt'];
                    };
                };
                \Cart::add([
                    'id'         => $idprod2,
                    'name'       => $product2->name,
                    'price'      => $product2->price_full,
                    'quantity'   => (int)$product2->countpr,
                    'attributes' => [
                        'id'     => $product2->id,
                        'pr'     => 'product',
                        'img'    => $imageres,
                        'imgalt' => $imagesalt,
                        'weight' => $product2->weight_full,
                    ]
                ]);
                $cart_id_w = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
                $data['basket'] = $cart_id_w;
            };
            foreach ($productgr->products3 as $itemel) {
                $product2 = Product::where('id', $itemel->id)->first();
                $idprod2 = $product2->id;


                $imageres = '';
                $imagesalt = '';
                $image2 = $product2->attachment()->get();
                if ($image2 != null) {
                    if (isset($image2[0])) {
                        $imageres = $image2[0]['url'];
                        $imagesalt = $image2[0]['alt'];
                    };
                };
                \Cart::add([
                    'id'         => $idprod2,
                    'name'       => $product2->name,
                    'price'      => $product2->price_full,
                    'quantity'   => (int)$product2->countpr,
                    'attributes' => [
                        'id'     => $product2->id,
                        'pr'     => 'product',
                        'img'    => $imageres,
                        'imgalt' => $imagesalt,
                        'weight' => $product2->weight_full,
                    ]
                ]);
                $cart_id_w = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
                $data['basket'] = $cart_id_w;
            };
            foreach ($productgr->products4 as $itemel) {
                $product2 = Product::where('id', $itemel->id)->first();
                $idprod2 = $product2->id;


                $imageres = '';
                $imagesalt = '';
                $image2 = $product2->attachment()->get();
                if ($image2 != null) {
                    if (isset($image2[0])) {
                        $imageres = $image2[0]['url'];
                        $imagesalt = $image2[0]['alt'];
                    };
                };
                \Cart::add([
                    'id'         => $idprod2,
                    'name'       => $product2->name,
                    'price'      => $product2->price_full,
                    'quantity'   => (int)$product2->countpr,
                    'attributes' => [
                        'id'     => $product2->id,
                        'pr'     => 'product',
                        'img'    => $imageres,
                        'imgalt' => $imagesalt,
                        'weight' => $product2->weight_full,
                    ]
                ]);
                $cart_id_w = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
                $data['basket'] = $cart_id_w;
            };
            foreach ($productgr->products5 as $itemel) {
                $product2 = Product::where('id', $itemel->id)->first();
                $idprod2 = $product2->id;


                $imageres = '';
                $imagesalt = '';
                $image2 = $product2->attachment()->get();
                if ($image2 != null) {
                    if (isset($image2[0])) {
                        $imageres = $image2[0]['url'];
                        $imagesalt = $image2[0]['alt'];
                    };
                };
                \Cart::add([
                    'id'         => $idprod2,
                    'name'       => $product2->name,
                    'price'      => $product2->price_full,
                    'quantity'   => (int)$product2->countpr,
                    'attributes' => [
                        'id'     => $product2->id,
                        'pr'     => 'product',
                        'img'    => $imageres,
                        'imgalt' => $imagesalt,
                        'weight' => $product2->weight_full,
                    ]
                ]);
                $cart_id_w = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
                $data['basket'] = $cart_id_w;
            };
            return response()->json(\Cart::getContent());
        }
    }

    public function addToCartGotResh(Request $request)
    {
        $productIds = $request->productsvr;
        $products = Product::query()->whereIn('id', $productIds)->get();
        $noImgUrl = '/assets/img/noImage.jpg';
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        $cart = \Cart::session($cart_id);

        $ids = $products->pluck('id')->toArray();
        $notAvailable = array_diff($productIds, $ids);
        $otherProduct = Product::query()->where('url', 'other')->first();

        foreach ($products as $product) {
            $imageres = '';
            $imagesalt = '';
            $image2 = $product->attachment()->get();
            if ($image2 != null) {
                if (isset($image2[0])) {
                    $imageres = $image2[0]['url'];
                    $imagesalt = $image2[0]['alt'];
                };
            };
            $cart->add([
                'id'         => $product->id,
                'name'       => $product->name,
                'price'      => $product->price_full,
                'quantity'   => (int)$product->countpr,
                'attributes' => [
                    'id'     => $product->id,
                    'pr'     => 'product',
                    'img'    => $imageres,
                    'imgalt' => $imagesalt,
                    'weight' => $product->weight_full,
                ]
            ]);
        }
        foreach ($notAvailable as $item) {
            $cart->add([
                'id'         => $otherProduct->id,
                'name'       => $otherProduct->name,
                'price'      => $otherProduct->price_full,
                'quantity'   => (int)$otherProduct->countpr,
                'attributes' => [
                    'id'     => $otherProduct->id,
                    'pr'     => 'product',
                    'img'    => $noImgUrl,
                    'imgalt' => $imagesalt,
                    'weight' => $otherProduct->weight_full,
                ]
            ]);
        }
        $data['products'] = $cart->getContent();
        $data['count'] = $cart->getTotalQuantity();

        return response()->json($data);
    }

    public function removeCart(Request $request)
    {
        \Cart::session($_COOKIE['cart_id']);
        \Cart::remove($request->id);
        //session($cart_id2)->flash('success', 'Item Cart Remove Successfully !');
        //dd($cartItems);


        return response()->json(\Cart::getContent());


        //dd($cartItems);
        //return view('basket', ['title' => 'Корзина'], compact('cartItems'));

        //$cart_id = $_COOKIE['cart_id'];
        /*\Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('basket');*/
        //return response()->json(['id'=>$request->id]);
    }

    public function updateCart(Request $request)
    {
        \Cart::session($_COOKIE['cart_id']);
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value'    => $request->quantity
                ],
            ]
        );

        //session()->flash('success', 'Item Cart is Updated Successfully !');

        return response()->json(\Cart::getContent());
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('basket');
    }
}
