<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'message'=> 'Book categories fetched successfully',
            'data' => BookCategory::paginate($request->input('limit', 10)),
        ]);
    }
}
