<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts =  Post::orderBy('created_at', 'desc')->simplePaginate(3);
        return view('posts.index')->with('posts' ,$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "required",
            
            'content' => "required",
        ]);

        if( $request->hasFile('image')){
          $fileNameWithExt =    $request->image = $request->file('image')->getClientOriginalName();
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('image')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().".".$extension;
  
          $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
      $posts= new Post;
      $posts->title = $request->title;
      $posts->content = $request->content;
      $posts->image = $fileNameToStore;
      $posts->user_id = auth()->user()->id;
    
      $posts->save();
        return redirect('/posts')->with('success', 'Sponsors created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show' )->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => "required",
        
        'content' => "required",
    ]);
       $post= Post::find($id);
       $post->title = $request->title;
      $post->content = $request->content;
      $post->image = $request->image;
      $post->save();
        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

    $post->delete();
    return redirect('/posts')->with('');
    }
}
