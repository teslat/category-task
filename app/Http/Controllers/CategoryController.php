<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Response;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'parent_id' => 'required'
        ]);
        $categories = [];
        $title = $data['title'];
        $data['title'] = 'SUB ' . $data['title'] . '-1';
        $categories[] = Category::create($data);
        $data['title'] = 'SUB ' . $title . '-2';
        $categories[] = Category::create($data);
        return Response::json($categories);
    }
}
