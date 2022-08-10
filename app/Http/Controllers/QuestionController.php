<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index()
    {
        return QuestionResource::collection(Question::orderBy('id','desc')->get());
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        $request['slug'] = Str::slug($fields['title']);
        $request['user_id'] = 1; //auth()->user();
        $question = Question::create($request->all());
        
        return QuestionResource::make($question);
    }

    public function show(Question $question)
    {
        return QuestionResource::make($question);
    }

    public function update(Request $request, Question $question)
    {
        $fields = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        $request['slug'] = Str::slug($fields['title']);
        if($question->update($request->all()))
            return QuestionResource::make($question);
        else
            return response("Not updated", Response::HTTP_NO_CONTENT);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response("Deleted Successfully",Response::HTTP_NO_CONTENT);
    }
}
