<?php

namespace App\Repositories;

use App\Repositories\Contracts\ICustomerRepository;
use App\Models\Customer;

class CustomerRepository implements ICustomerRepository
{
    public function getAll()
    {
        try {
            $customers = Customer::all();
            return $customers;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function saveOrUpdate(Customer $customer)
    {
        try {
            $customer->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $customer = Customer::find($id);
            return $customer;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function delete($id)
    {
        try {
            Customer::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
