<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return Post::all();
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'img'  => $request->img,
            'tag' => $request->tag,
            'title' => $request->title,
            'label' => $request->label,
            'content' => $request->content,
        ]);

        return response()->json($post, 201);
    }

    // Display the specified resource.
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'img' => 'sometimes|required|string|max:255',
            'tag' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'label' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return response()->json($post);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(null, 204);
    }
}
