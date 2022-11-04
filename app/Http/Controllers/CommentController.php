<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Validator;


class CommentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::latest()->with('news')->paginate(5);

        $collection = CommentResource::collection($comment);

        return $this->sendResponse($collection, 'Comments Get Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'     => 'required',
            'comment'   => 'required',
            'news_id' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return $this->sendError('Validator Error', $validator->errors());
        }

        //create comment
        $comment = Comment::create([
            'user_id'     => $request->user_id,
            'comment'   => $request->comment,
            'news_id'   => $request->news_id,
        ]);

        //return response
        return $this->sendResponse(new CommentResource($comment), 'Comment Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'user_id'     => 'required',
            'comment'   => 'required',
            'news_id' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return $this->sendError('Validator Error', $validator->errors());
        } else {


            $comment->update([
                'user_id'     => $request->user_id,
                'comment'   => $request->comment,
                'news_id'   => $request->news_id,
            ]);
        }

        //return response
        return $this->sendResponse(new CommentResource($comment), 'Comment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
