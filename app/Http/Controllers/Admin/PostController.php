<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Mail\NewPostMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    // Get the post by slug
    private function findPostBySlug($slug)
    {
        $post = Post::where("slug", $slug)->first();
        if (!$post) {
            abort(404);
        }
        return $post;
    }

    // Generate a new slug
    private function generatePostSlug($text)
    {
        $toReturn = null;
        $counter = 0;

        do {
            $slug = Str::slug($text);

            if ($counter > 0) {
                $slug .= "-" . $counter;
            }

            $slugExists = Post::where("slug", $slug)->first();

            if ($slugExists) {
                $counter++;
            } else {
                $toReturn = $slug;
            }
        } while ($slugExists);

        return $toReturn;
    }

    // Validation rules for post
    public static $postValidationRules = [
        "title" => "required|min:5",
        "content" => "required|min:10",
        "tags" => "nullable|exists:tags,id",
        "cover_img" => "required|image"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get the logged user
        $user = Auth::user();

        // Filter the post according to the user role 
        if ($user->role === "admin") {
            $posts = Post::orderBy("created_at", "desc")->paginate(5);
        } else {
            $posts = Post::where("user_id", $user->id)->orderBy("created_at", "desc")->paginate(5);
        };

        // Return the view with all posts
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();

        return view("admin.posts.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $newPost = new Post();
        $newPost->fill($data);

        $newPost->user_id = Auth::user()->id;

        // Save file on server and return the link
        $coverImg = Storage::put("/post_covers", $data["cover_img"]);
        // Save the data into the new post
        $newPost->cover_img = $coverImg;

        $newPost->slug = $this->generatePostSlug($newPost->title);

        $newPost->save();

        if (key_exists("tags", $data)) {
            $newPost->tags()->attach($data["tags"]);
        }

        // Send email
        Mail::to($newPost->user->email)->send(new NewPostMail($newPost));

        return redirect()->route('admin.posts.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->findPostBySlug($slug);
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = $this->findPostBySlug($slug);
        $tags = Tag::all();
        return view("admin.posts.edit", compact("post", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $slug)
    {
        $data = $request->validated();
        $post = $this->findPostBySlug($slug);

        // Check if there is an image uploaded
        if (key_exists("cover_img", $data)) {
            // Delete the image, if the post has already one
            if ($post->cover_img) {
                Storage::delete($post->cover_img);
            }
            // Save the file on server and return the link
            $coverImg = Storage::put("/post_covers", $data["cover_img"]);
            // Save the link in the post data
            $post->cover_img = $coverImg;
        }

        // Check if the title has changed
        if ($data["title"] !== $post->title) {
            $post->slug = $this->generatePostSlug($data["title"]);
        }

        // Add tags to the current post or delete all tags if select is empty
        if (key_exists("tags", $data)) {
            $post->tags()->sync($data["tags"]);
        } else {
            $post->tags()->sync([]);
        }

        $post->update($data);
        return redirect()->route("admin.posts.show", $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = $this->findPostBySlug($slug);

        // Delete all post tags
        $post->tags()->detach();

        $post->delete();
        return redirect()->route("admin.posts.index");
    }
}
