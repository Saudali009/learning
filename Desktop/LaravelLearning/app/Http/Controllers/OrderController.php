<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request) {

            $data = $request->all();

            if (!empty($request)) {
                Order::create($data);
                return response()->json(['data' => 'Order saved successfully.']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllOrders(Request $request)
    {
        if ($request->filled('id')) {
            $userId = $request->get('id');
            $user = User::find($userId);
            if ($user) {
                $orders = $user->orders()->with('product:id,name,price')->get()->pluck('product');

                if (!empty($orders)) {
                    return response()->json(['data' => $orders]);
                } else {
                    return response()->json(['data' => 'No order found.']);
                }
            } else {
                return response()->json(['data' => 'No user found.']);
            }
        } else {
            return response()->json(['error' => 'Invalid ID found.']);
        }
    }
}
