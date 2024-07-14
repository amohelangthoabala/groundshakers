<?php

namespace App\Http\Controllers;

use App\Models\Hero_Post;
use Illuminate\Http\Request;

class Hero_PostController extends Controller
{
  // Display a listing of the resource.
  public function index()
  {
      return Hero_Post::all();
  }

  // Store a newly created resource in storage.
  public function store(Request $request)
  {
      $request->validate([
          'title' => 'required|string|max:255',
          'content' => 'required|string',
      ]);

      $post = Hero_Post::create([
          'title' => $request->title,
          'content' => $request->content,
      ]);

      return response()->json($post, 201);
  }

  // Display the specified resource.
  public function show($id)
  {
      $post = Hero_Post::findOrFail($id);
      return response()->json($post);
  }

  // Update the specified resource in storage.
  public function update(Request $request, $id)
  {
      $request->validate([
          'title' => 'sometimes|required|string|max:255',
          'content' => 'sometimes|required|string',
      ]);

      $post = Hero_Post::findOrFail($id);
      $post->update($request->all());

      return response()->json($post);
  }

  // Remove the specified resource from storage.
  public function destroy($id)
  {
      $post = Hero_Post::findOrFail($id);
      $post->delete();

      return response()->json(null, 204);
  }
}
