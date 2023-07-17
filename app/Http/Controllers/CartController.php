<?php

namespace App\Http\Controllers;

use App\Interfaces\CommandRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(): View|Application|Factory
    {
//        if (session('cart') !== null) { session()->flush();}
        return view("cart");
    }

    public function addToCart($id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "weight" => $product->weight
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier avec succés.');
    }

    public function update(Request $request, ProductRepositoryInterface $productRepository): RedirectResponse
    {
        $product = $productRepository->getProductById((int)$request->id);
        $cart = session()->get('cart');

        if (empty($product))
        {
            return  redirect()->route('cart.index')->with('danger', 'Ce produit n\'existe pas.');
        }

        foreach ($cart as $id => $datas)
        {
            if ($id != $product->id)
            {
                return redirect()->route('cart.index')->with('danger', 'Ce produit n\'est pas dans votre panier.');
            } else {
                if ($request->quantity < 1)
                {
                    return redirect()->route('cart.index')->with('danger', 'Vous ne pouvez pas mettre une quantité inférieure à 1.');
                }

                if ($request->quantity > $product->stock)
                {
                    return redirect()->route('cart.index')->with('danger', 'Vous ne pouvez pas commander plus que le stock disponible.');
                }

                if($request->id && $request->quantity)
                {
                    $cart[$request->id]["quantity"] = (int)$request->quantity;
                    session()->put('cart', $cart);
                    session()->flash('success', 'Votre panier a été mis à jour.');
                }
            }
        }
        return redirect()->route('cart.index');
    }

    public function remove(Request $request): RedirectResponse
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produit supprimé avec succés.');
        }

        return redirect()->route('cart.index');
    }

    public function empty(): RedirectResponse
    {
        session()->forget("cart");
        return redirect()->route('cart.index')->with('success', 'Votre panier a été supprimé avec succés.');
    }
}
