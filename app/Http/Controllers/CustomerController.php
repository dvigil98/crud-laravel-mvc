<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contracts\ICustomerService;
use App\Http\Requests\CustomerFormRequest;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(ICustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getCustomers();
        return view('customer/index', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customer/create');
    }

    public function store(CustomerFormRequest $request)
    {
        $request->validated();
        if ( $this->customerService->saveCustomer($request) )
            return redirect('/customers/create')->with('msgType', 'success')->with('msg', 'Datos guardados');
        return redirect('/customers/create')->with('msgType', 'error')->with('msg', 'Datos no guardados');
    }

    public function edit($id)
    {
        $customer = $this->customerService->getCustomer($id);
        return view('customer/edit', ['customer' => $customer]);
    }

    public function update($id, CustomerFormRequest $request)
    {
        $request->validated();
        if ( $this->customerService->updateCustomer($id, $request) )
            return redirect('/customers')->with('msgType', 'success')->with('msg', 'Datos actualizados');
        return redirect('/customers')->with('msgType', 'error')->with('msg', 'Datos no actualizados');
    }

    public function destroy($id)
    {
        if ( $this->customerService->deleteCustomer($id) )
            return redirect('/customers')->with('msgType', 'success')->with('msg', 'Datos eliminados');
        return redirect('/customers')->with('msgType', 'error')->with('msg', 'Datos no eliminados');
    }

    public function show($id)
    {
        $customer = $this->customerService->getCustomer($id);
        return view('customer/show', ['customer' => $customer]);
    }
}
