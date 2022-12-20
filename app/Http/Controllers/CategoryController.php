<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }
    public function insert(Request $request)
    {
        $category = new Category();
        $validator  = Validator::make(
            $request->all(),
            [
                'name'=>'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $category->name = $request->input('name');
        $category->save();
        return response()->json(["category created successfully", $category]);
    }
    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $validator  = Validator::make(
            $request->all(),
            [
                'name'=>'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $category->name = $request->input('name');
        $category->update();
        return response()->json(["category updated successfully",$category]);
        
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json("category deleted successfully");
    }
}
