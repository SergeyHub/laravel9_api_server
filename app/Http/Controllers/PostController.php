<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$posts = Post::query()->get();  // Eloquent ORM
        $pageSize = $request->page_size ?? 10;
        $posts = Post::query()->paginate($pageSize);
        //$posts = Post::query()->where('id','=',1)->get();  // Eloquent ORM

        /*return new JsonResponse([
            'data' => $posts
        ]);*/
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $created = DB::transaction(function () use ($request) {

            $created = Post::query()->create([
                'title' => $request->title,
                'body' => $request->body,
            ]);
            if ($userIds = $request->user_ids) {
                $created->users()->sync($userIds);
            }
            return $created;
        });

        return new PostResource($created);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
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
     * @param \App\Http\Requests\UpdatePostRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        /*$created = DB::transaction(function () use ($request) {

            $created = Post::query()->create([
                'title' => $request->title,
                'body' => $request->body,
            ]);
            if ($userIds = $request->user_ids) {
                $created->users()->sync($userIds);
            }
            return $created;
        });

        return new JsonResponse([
            'status' => true,
            'message' => "Post № = " . $post . " successfully created.",
            'data' => $created
        ]);*/
        $updated = $post->update([
            'title' => $request->title ?? $post->title,
            'body' => $request->body ?? $post->body,
        ]);
        if(!$updated){
            return new JsonResponse([
                'error' => 'Failed to update model.'
            ], 400);
        }

        return new PostResource($post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $deleted = $post->forceDelete();

        if (!$deleted) {
            return new JsonResponse([
                'error' => 'Could not delete resource.',
            ], 400);
        }
        return new JsonResponse([
            'data' => "Post № = " . $post . " successfully delete."
        ]);
    }
}
