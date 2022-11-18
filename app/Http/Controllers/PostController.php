<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()->get();  // Eloquent ORM
        //$posts = Post::query()->where('id','=',1)->get();  // Eloquent ORM

        return new JsonResponse([
            'data' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Post::query()->create($request->toArray());
        $post = Post::query()->create([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        return new JsonResponse([
            'status' => true,
            'message' => "Post successfully created.",
            'data' => $post
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new JsonResponse([
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $created = DB::transaction(function () use ($request) {

            $created = Post::query()->create([
                'title' => $request->title,
                'body' => $request->body,
            ]);
            if($userIds = $request->user_ids){
                $created->users()->sync($userIds);
            }
            return $created;
        });

        return new JsonResponse([
            'status' => true,
            'message' => "Post № = ".$post." successfully created.",
            'data' => $created
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $deleted = $post->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'error' => 'Could not delete resource.',
            ], 400);
        }
        return new JsonResponse([
            'data' => 'success'
        ]);
    }
}
