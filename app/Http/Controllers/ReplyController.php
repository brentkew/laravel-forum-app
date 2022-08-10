<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Models\Reply;
use App\Models\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    public function index(Question $question)
    {
        return  ReplyResource::collection($question->replies);
    }

    public function store(Question $question, Request $request)
    {
        $fields = $request->validate([
            'body' => 'required|string',
            'question_id' => 'required|integer',
            'user_id' => 'required|integer'
        ]);

        $question->replies()->create($request->all());
        return ReplyResource::collection($question->replies);
    }

    public function show(Question $question,Reply $reply)
    {
        return $reply;
    }

    public function update(Question $question, Request $request, Reply $reply)
    {
        if($reply->update($request->all()))
            return ReplyResource::make($reply);
        else
            return response("Not updated", Response::HTTP_NO_CONTENT);

    }

    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        return response("Deleted Successfully", Response::HTTP_NO_CONTENT);
    }
}
