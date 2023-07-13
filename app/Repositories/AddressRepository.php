<?php

namespace App\Repositories;

use App\Interfaces\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface
{

    public function getAllAddresses()
    {
        return Address::orderBy('user_id', 'desc')->get();
    }

    public function getAddressById($addressId)
    {
        return Address::find($addressId);
    }

    public function deleteAddress($addressId)
    {
        Address::destroy($addressId);
    }

    public function createAddress(array $addressDetails)
    {
        Address::create($addressDetails);
    }

    public function updateAddress($addressId, array $newDetails)
    {
        return Address::whereId($addressId)->update($newDetails);
    }
}
