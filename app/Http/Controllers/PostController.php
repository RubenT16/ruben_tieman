<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->latest('updated_at')->paginate(1);
        return view('posts.index')->with('posts', $posts);
    
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
            'title' => 'required|max:120',
            'text' => 'required'
        ]);
    
        $post = new Post([              //nieuw object aan maken van Post model
        'user_id' => Auth::id(),    //id van de huidige user in user_id zetten
        'title' => $request->title, //title (request) in title zetten
        'text' => $request->text    //text (request) in text zetten
    ]);
    $post->save();                  //het object opslaan en dus de rij opslaan in de tabel
    
    return to_route('posts.index'); //redirect naar de route posts.index
    
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);
    
        $post->update([
            'title' => $request->title,
            'text' => $request->text
        ]);
    
        return to_route('posts.show', $post);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        {
            $post->delete();
            return to_route('posts.index');
        }
        
    }
}
