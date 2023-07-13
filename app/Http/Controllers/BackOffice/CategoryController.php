<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryRepositoryInterface $categoryRepository): View|Application|Factory
    {
        $categoriesList = $categoryRepository->getAllCategories();
        return view('backoffice/categories/bo_categories', compact('categoriesList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        return view('backoffice/categories/category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CategoryRepositoryInterface $categoryRepository): RedirectResponse
    {
        $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
            'image' => ['bail', 'nullable', 'string', 'max:255'],
            'alt' => ['bail', 'nullable', 'string', 'max:255'],
            'description' => ['bail', 'required', 'string'],
            'link' => ['bail', 'required', 'string', 'max:255']
        ]);

        $categoryRepository->createCategory([
            'name' => $request->name,
            'image' => $request->image,
            'alt' => $request->alt,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie créee avec succés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, CategoryRepositoryInterface $categoryRepository): View|Application|Factory
    {
        $categoryId = $request->route('id');
        $category = $categoryRepository->getCategoryById($categoryId);
        return view('backoffice/categories/category_show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, CategoryRepositoryInterface $categoryRepository): View|Application|Factory
    {
        $categoryId = $request->route('id');
        $category = $categoryRepository->getCategoryById($categoryId);
        return view('backoffice/categories/category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryRepositoryInterface $categoryRepository): RedirectResponse
    {
        $request->validate([
            'name' => ['bail', 'nullable', 'string', 'max:255'],
            'image' => ['bail', 'nullable', 'string', 'max:255'],
            'alt' => ['bail', 'nullable', 'string', 'max:255'],
            'description' => ['bail', 'nullable', 'string'],
            'link' => ['bail', 'nullable', 'string', 'max:255']
        ]);

        $categoryId = $request->route('id');
        $category = $categoryRepository->getCategoryById($categoryId);

        $categoryRepository->updateCategory($category->id, [
            'name' => !empty($request->name) ? $request->name : $category->name,
            'image' => !empty($request->image) ? $request->image : $category->image,
            'alt' => !empty($request->alt) ? $request->alt : $category->alt,
            'description' => !empty($request->description) ? $request->description : $category->description,
            'link' => !empty($request->link) ? $request->link : $category->link
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie modifiée avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, CategoryRepositoryInterface $categoryRepository): RedirectResponse
    {
        $categoryId = $request->route('id');
        $category = $categoryRepository->getCategoryById($categoryId);
        $categoryRepository->deleteCategory($category->id);
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succés.');
    }
}
