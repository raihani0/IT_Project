<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class postController extends Controller
{
    /**
     * write code on Method
     *  
     * @return response{}
     */
  public function index(Request $request)
  {
    $posts = Post::paginate(10);

    return view("posts.index", compact('posts'));

  }

  /**
   * Writebcode on Method
   * 
   * @return response{}
   */
  public function create(Request $request)
  {
    return view ("posts.create");
  }
  
  /**
   * Writebcode on Method
   * 
   * @return response{}
   */
  public function store(Request $request)
  {
    $request->validate([
      "title" => "required",
      "body" => "required",
    ]);

    Post::create([
      "title" => $request->title,
      "body" => $request->body
    ]);

    return redirect()->route("posts.index")->with("success", "post create.");
    
  }
  /**
   * Writebcode on Method
   * 
   * @return response{}
   */
  public function edit(Request $request, $id)
  {
     $post = Post::findOrFail($id);

     return view("posts.edit", compact('post'));
  }
  /**
   * Writebcode on Method
   * 
   * @return response{}
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      "title" => "required",
      "body" => "required",
    ]);

    $post = Post::find($id);

    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();

    return redirect()->route("posts.index")->with("success", "post updated.");
  }

  /**
   * Writebcode on Method
   * 
   * @return response{}
   */
  public function show(Request $request, $id)
  {
     $post = Post::find($id);

     return view("posts.show", compact('post'));
  }
  /**
   * Writebcode on Method
   * 
   * @return response{}
   */
  public function destroy(Request $request, $id)
  {
     $post = Post::find($id);
     $post->delete();

     return redirect()->route("posts.index")->with("success", "post deleted successfully");

  }

}