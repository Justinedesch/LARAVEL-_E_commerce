<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show(Request $request): Application|View|Factory|Redirector|RedirectResponse
    {
        $categoryId = $request->route('id');
        $cat = $this->categoryRepository->getCategoryById($categoryId);

        if (empty($cat)) { return redirect(route('accueil.index')); }
        $productsOfCat = $this->categoryRepository->getProductsByCategory($categoryId);

        return view('products_by_cat', ['cat' => $cat, 'products' => $productsOfCat]);
    }


}
