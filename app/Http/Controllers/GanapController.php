<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class GanapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'title' => 'required|string|max:50',
            'content' => 'required|string|max:255',
            
        ]);
        // Generate slug from the title
        $slug = Str::slug($request->title);
        $count = Post::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1); // Append a number to make it unique
        }

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'user_id' => auth()->id()
        ];

        $insert = query_builder('INSERT','posts',$data);

        if(! $insert){
            return json_message('error while processing your request',200,1);
        }
        return json_message('success',200,0);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        /**
         * 
         * // Get the user who created a post
            *$post = Post::find(1);
           * $user = $post->user;

           * // Get all posts by a specific user
           * $user = User::find(1);
           * $posts = $user->posts;
                    * 
         */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
