<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use App\Models\Product;

class ProductController extends Controller
{
	public function index()
	{
    	return response()->json(['message' => 'Display all products']);
	}

	public function store(Request $request)
	{
    	return response()->json(['message' => 'Product created successfully']);
	}

	public function show($id)
	{
    	return response()->json(['message' => 'Display product with ID: ' . $id]);
	}

	public function update(Request $request, $id)
	{
    	return response()->json(['message' => 'Product with ID ' . $id . ' updated successfully']);
	}

	public function destroy($id)
	{
    	return response()->json(['message' => 'Product with ID ' . $id . ' deleted successfully']);
	}

	public function uploadImageLocal(Request $request)
    {
        if ($request->hasFile('image')) {
            Storage::disk('local')->put('/', $request->file('image'));
            return "Image successfully stored in local disk driver.";
        }
        return "No image uploaded.";
    }

    public function uploadImagePublic(Request $request)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->put('/', $request->file('image'));
            return "Image successfully stored in public disk driver.";
        }
        return "No image uploaded.";
    }


}