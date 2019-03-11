<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Http\Resources\Productresource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $data = Product::with('attachments', 'category')->get();

        return response()->json(['meta' => [
            'responseCode' => 200,
            'message' => 'success'
        ], 'data' => Productresource::collection($data)]);
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
            $validator = Validator::make($request->all(), [
                'name' => 'bail|required',
                'price' => 'bail|required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => 'The key is invalid/missing'], 403);
            } else {
                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    $image = $request->file('image');
                    $path = storage_path() . '/app/public/images/';
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move($path, $filename);
                    $imageStoredPath = $path . $filename;
                    $product = new Product();
                    $attachment = new Attachment();
                    $attachment->path = $imageStoredPath;
                    $product->name = $request->get('name');
                    $product->price = $request->get('price');
                    $product->save();
                    $product->attachments()->save($attachment);
                } else {
                    return response()->json(['error' => 'Invalid Image file'], 403);
                }
            }
            return response()->json(['data' => 'Product saved successfully.']);
        }
    }

    public function getProductDetail(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->get('id');
            $product = Product::find($id);
            if ($product) {
                $product->attachments;
                return response()->json(['product' => $product]);
            }
        } else {
            return response()->json(['data' => 'Invalid request/key missing.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
