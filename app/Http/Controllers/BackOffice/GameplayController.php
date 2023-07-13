<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Interfaces\GameplayRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Gameplay;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GameplayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GameplayRepositoryInterface $gameplayRepository): View|Application|Factory
    {
        $gameplaysList = $gameplayRepository->getAllGameplays();
        return view('backoffice/gameplays/bo_gameplays', compact('gameplaysList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductRepositoryInterface $productRepository): View|Application|Factory
    {
        $products = $productRepository->getAllProducts();
        return view('backoffice/gameplays/gameplay_create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, GameplayRepositoryInterface $gameplayRepository)
    {
        $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
            'image' => ['bail', 'nullable', 'string', 'max:255'],
            'alt' => ['bail', 'nullable', 'string', 'max:255'],
            'product_id' => ['bail', 'nullable', 'integer','not_in:0', 'exists:products,id']
        ]);

        $gameplayRepository->createGameplay([
            'name' => $request->name,
            'image' => $request->image,
            'alt' => $request->alt,
            'product_id' => $request->product_id
        ]);

        return redirect()->route('gameplays.index')->with('success', 'Gameplay ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, GameplayRepositoryInterface $gameplayRepository, ProductRepositoryInterface $productRepository): View|Application|Factory
    {
        $gameplayId = $request->route('id');
        $gameplay = $gameplayRepository->getGameplayById($gameplayId);
        $product = $productRepository->getProductById($gameplay->product_id);
        return view('backoffice/gameplays/gameplay_show', compact('gameplay', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, GameplayRepositoryInterface $gameplayRepository, ProductRepositoryInterface $productRepository): View|Application|Factory
    {
        $gameplayId = $request->route('id');
        $gameplay = $gameplayRepository->getGameplayById($gameplayId);
        $products = $productRepository->getAllProducts();
        return view('backoffice/gameplays/gameplay_edit', compact('gameplay','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,GameplayRepositoryInterface $gameplayRepository): RedirectResponse
    {
        $request->validate([
            'name' => ['bail', 'nullable', 'string', 'max:255'],
            'image' => ['bail', 'nullable', 'string', 'max:255'],
            'alt' => ['bail', 'nullable', 'string', 'max:255'],
            'product_id' => ['bail', 'nullable', 'required_if:integer,not_in:0,exists:products,id']
        ]);

        $gameplayId = $request->route('id');
        $gameplay = $gameplayRepository->getGameplayById($gameplayId);

        if ($request->product_id === "Choisir un produit") { $product_id = null; } else { $product_id = $request->product_id; }

        $gameplayRepository->updateGameplay($gameplay->id, [
            'name' => !empty($request->name) ? $request->name : $gameplay->name,
            'image' => !empty($request->image) ? $request->image : $gameplay->image,
            'alt' => !empty($request->alt) ? $request->alt : $gameplay->alt,
            'product_id' => $product_id
        ]);

        return redirect()->route('gameplays.index')->with('success', 'Gameplay modifié avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, GameplayRepositoryInterface $gameplayRepository): RedirectResponse
    {
        $gameplayId = $request->route('id');
        $gameplay = $gameplayRepository->getGameplayById($gameplayId);
        $gameplayRepository->deleteGameplay($gameplay->id);
        return redirect()->route('gameplays.index')->with('success', 'Gameplay supprimé avec succés.');
    }
}
