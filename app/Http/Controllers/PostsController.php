<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    /**
     * Only the Blog page and the articles are reachable for guests
     * Guests can't reach edit page of an article for instance, just by manually typing the URL
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('blog.index')->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Title and description are required
         * Image is required and can only be JPG, PNG or JPEG format with a maximum filesize of 5048 KBs
         */
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        /**
         * The image is saved with the name of a unique id (consisting of random letters and numbers), the title and finally the extension is put at the end
         */
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        /**
         * Image is saved on the constructed $newImageName in the images folder inside 'public'
         */
        $request->image->move(public_path('images'), $newImageName);

        /**
         * Creating the post object with the inputs and the slug generated by SlugService
         */
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'The post has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        /**
         * Title and description can't be empty
         */
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        /**
         * Updating the edited Post object with the changes 
         */
        Post::where('slug', $slug)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // Saving the builder instance in the 'post' variable (identified by the slug)
        $post = Post::where('slug', $slug);

        // Saving the post object in the 'file' variable
        $file = Post::where('slug', $slug)->first();

        // deleting the image from the 'images' library on deletion of the post
        unlink('images/' . $file->image_path);

        // deleting the post instance
        $post->delete();

        return redirect('/blog')->with('message', 'Your post has been deleted!');
    }
}