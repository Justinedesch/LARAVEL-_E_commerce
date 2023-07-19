<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Interfaces\CommandRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Command;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class OrderController extends Controller
{

    public function indexOfAdmin(CommandRepositoryInterface $commandRepository): View|Application|Factory
    {
        $ordersList = $commandRepository->getAllCommands();
        return view('backoffice/orders/admin/orders_users', compact('ordersList'));
    }

    public function showOfAdmin(Request $request, CommandRepositoryInterface $commandRepository, UserRepositoryInterface $userRepository, ProductRepositoryInterface $productRepository): View|Application|Factory
    {
        $orderId = $request->route('id');
        $order = $commandRepository->getCommandtById($orderId);
        $user = $userRepository->getUsertById($order->user_id);
        $addressByUser = $userRepository->getAddressByUser($user->id);
        $product = $productRepository->getProductById($order->product_id);

        return view('backoffice/orders/admin/order_show', compact('order', 'user','addressByUser','product'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexOfUser(Request $request, CommandRepositoryInterface $commandRepository): View|Application|Factory
    {
        $user = $request->user();
        $ordersList = $commandRepository->getCommandtByUserId($user->id);
        return view('backoffice/orders/orders_of_user', compact('ordersList', 'request'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProductRepositoryInterface $productRepository, CommandRepositoryInterface $commandRepository): RedirectResponse
    {
        $cart = session()->get('cart');
        $user = $request->user();
        $dateNow = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $numOrder = $dateNow->format('dmY_His').'__'.$user->id.'__'.count($cart).'__'.rand(1111111111,9999999999);

        foreach ($cart as $item)
        {
            $product = $productRepository->getProductById($item['id']);
            $newStock = $product->stock - $request->quantity;

            $commandRepository->createCommand([
                "identifiant" => $numOrder,
                "user_id" => $user->id,
                "product_id" => $product->id,
                "totalQ" => $request->totalQ,
                "totalO" => $request->totalC
            ]);

            $productRepository->updateProduct($product->id, [
                'stock' => $newStock
            ]);

        }

        session()->forget('cart');
        return redirect()->route('accueil.index')->with('success', 'Votre commande à bien été enregistrée.');
    }

    /**
     * Display the specified resource.
     */
        public function show(Request $request, CommandRepositoryInterface $commandRepository, UserRepositoryInterface $userRepository, ProductRepositoryInterface $productRepository): View|Application|Factory
        {
        $orderId = $request->route('id');
        $order = $commandRepository->getCommandtById($orderId);
        $user = $userRepository->getUsertById($order->user_id);
        $addressByUser = $userRepository->getAddressByUser($user->id);
        $product = $productRepository->getProductById($order->product_id);

        return view('backoffice/orders/order_show', compact('order', 'user','addressByUser','product'));
    }
}
