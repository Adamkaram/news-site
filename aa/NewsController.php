<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $posts)
    {
        return view('posts.index', compact('posts'));
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'selected' => 'required'
            // 'image' => 'image|nullable|max:1999'
        ]);
        $post = new News;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->hashtag = $request->get('selected');
        $post->user_id = auth()->user()->id;
        $post->save();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $post->addMediaFromRequest('image')->toMediaCollection('images');
        }


        Session::flash('message', 'Successfully created nerd!');
        return Redirect::to('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = News::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $post = News::find($id);

        //Check if post exists before deleting
        if (!isset($post)) {
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $post->clearMediaCollection('images');

            $post->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }

        $post->update([
            'title' =>  $request->input('title'),
            'body' => $request->input('body')
        ]);

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $post = News::find($id);

        //Check if post exists before deleting
        if (!isset($post)) {
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if ($post->news_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/news_images/' . $post->news_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
