<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::All();
       return view ('posts.index', compact('posts')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view ('posts.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Valider et enregistrer le post de l'utilisateur connecté
        $validated = $request->validate ([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));

        $post = Post::find($post->$id);
        return view ('posts.show', compact('post')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage. Utilisateur connecté uniquement.
     */
    public function update(Request $request, Post $post)
    {
       $post = Post::find($post->id);
       
        //Valider et mettre à jour le post
        $validated = $request->validate ([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->save();

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
