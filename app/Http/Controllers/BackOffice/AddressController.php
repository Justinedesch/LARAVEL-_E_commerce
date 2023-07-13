<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Interfaces\AddressRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Address;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AddressRepositoryInterface $addressRepository): View|Factory|Application
    {
        $addressesList = $addressRepository->getAllAddresses();
        return view('backoffice/addresses/bo_addresses', compact('addressesList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserRepositoryInterface $userRepository): View|Factory|Application
    {
        $users = $userRepository->getAllUsers();
        return view('backoffice/addresses/address_create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AddressRepositoryInterface $addressRepository): RedirectResponse
    {
        $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
            'address' => ['bail', 'required', 'string', 'max:255'],
            'department' => ['bail', 'required', 'integer', 'gte:0'],
            'town' => ['bail', 'required', 'string', 'max:255'],
            'country' => ['bail', 'required', 'string', 'max:255'],
            'user_id' => ['bail', 'required', 'integer','not_in:0', 'exists:users,id']
        ]);

        $town = ucfirst($request->town);
        $country = ucfirst($request->country);

        $updateAddress = $request->address .' '. $request->department .' '. $town .' '. $country;

        $addressRepository->createAddress([
            'name' => $request->name,
            'address' => $updateAddress,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('addresses.index')->with('success', 'Adresse créee avec succés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, AddressRepositoryInterface $addressRepository): View|Factory|Application
    {
        $addressId = $request->route('id');
        $address = $addressRepository->getAddressById($addressId);
        $user = $address->user;
        return view('backoffice/addresses/address_show', compact('address', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, AddressRepositoryInterface $addressRepository, UserRepositoryInterface $userRepository): View|Factory|Application
    {
        $addressId = $request->route('id');
        $address = $addressRepository->getAddressById($addressId);
        $users = $userRepository->getAllUsers();

        return view('backoffice/addresses/address_edit', compact('address', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddressRepositoryInterface $addressRepository): RedirectResponse
    {
        $request->validate([
            'name' => ['bail', 'nullable', 'string', 'max:255'],
            'address' => ['bail', 'nullable', 'string', 'max:255'],
            'department' => ['bail', 'nullable', 'nullable', 'max:5'],
            'town' => ['bail', 'nullable', 'string', 'max:255'],
            'country' => ['bail', 'nullable', 'string', 'max:255'],
            'user_id' => ['bail', 'nullable', 'integer','not_in:0', 'exists:users,id']
        ]);

        if (!empty($request->town)) { $town = ucfirst($request->town); }
        if (!empty($request->country)) { $country = ucfirst($request->country); }

        $addressId = $request->route('id');
        $address = $addressRepository->getAddressById($addressId);

        if (empty($request->address) && empty($request->department) && empty($request->town) && empty($request->country))
        {
            $updateAddress = $address->address;
        } else {
            $updateAddress = $request->address .' '. $request->department .' '. $town .' '. $country;
        }

        $addressRepository->updateAddress($address->id, [
            'name' => !empty($request->name) ? $request->name : $address->name,
            'address' => $updateAddress,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('addresses.index')->with('success', 'Adresse modifiée avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, AddressRepositoryInterface $addressRepository): RedirectResponse
    {
        $addressId = $request->route('id');
        $address = $addressRepository->getAddressById($addressId);
        $addressRepository->deleteAddress($address->id);
        return redirect()->route('addresses.index')->with('success', 'Adresse supprimée avec succés.');
    }
}
