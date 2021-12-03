<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['customers' => Customer::query()->orderBy('created_at', 'DESC')->get()], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        try {
            $customer = Customer::create([
                'name'    => $request->input('name'),
                'address' => $request->input('address'),
                'email'   => $request->input('email'),
                'phone'  => $request->input('phone')
            ]);

            return response()->json(['customer' => $customer], Response::HTTP_CREATED);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response()->json(['customer' => $customer], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        try {
            $customer->update([
                'name'    => $request->input('name'),
                'address' => $request->input('address'),
                'email'   => $request->input('email'),
                'phone'  => $request->input('phone')
            ]);

            return response()->json(['customer' => $customer, 'status' => 'OK'], Response::HTTP_CREATED);

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => $e->getCode()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['status' => 'ok'], Response::HTTP_OK);
    }
}
