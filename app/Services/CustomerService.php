<?php

namespace App\Services;

use App\Services\Contracts\ICustomerService;
use App\Repositories\Contracts\ICustomerRepository;
use App\Models\Customer;

class CustomerService implements ICustomerService
{
    private $customerRepository;

    public function __construct(ICustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getCustomers()
    {
        try {
            $customers = $this->customerRepository->getAll();
            return $customers;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function saveCustomer($data)
    {
        try {
            $customer = new Customer();
            $customer->name = $data['name'];
            $customer->phone = $data['phone'];
            $customer->email = $data['email'];
            $customer->dni = $data['dni'];
            $customer->address = $data['address'];
            if ( $this->customerRepository->saveOrUpdate($customer) )
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getCustomer($id)
    {
        try {
            $customer = $this->customerRepository->getById($id);
            return $customer;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function updateCustomer($id, $data)
    {
        try {
            $customer = $this->customerRepository->getById($id);
            $customer->name = $data['name'];
            $customer->phone = $data['phone'];
            $customer->email = $data['email'];
            $customer->dni = $data['dni'];
            $customer->address = $data['address'];
            if ( $this->customerRepository->saveOrUpdate($customer) )
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function deleteCustomer($id)
    {
        try {
            if ( $this->customerRepository->delete($id) )
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
