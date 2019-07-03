<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $question = Question::whereNotIn('user_id', [$request->user()->id])->get();

        return response()->json([
            'data' => $question,
            'message' => 'Success'
        ], 200);
    }

    public function show(Request $request)
    {
        $question = Question::where(
            'user_id',
            $request->user()->id
        )->get();

        return response()->json([
            'data' => $question,
            'message' => 'Success'
        ], 200);
    }

    public function view(Request $request, $id)
    {
        $question = Question::where([
            ['user_id', $request->user()->id],
            ['id', $id]
        ])->get();

        return response()->json([
            'data' => $question,
            'message' => 'Success'
        ], 200);
    }

    public function store(Request $request)
    {
        $question = Question::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'user_id' => $request->user()->id
        ]);

        return response()->json([
            'data' => $question,
            'message' => 'Success'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        $question->title = $request->get('title');
        $question->description = $request->get('description');
        $question->save();

        return response()->json([
            'data' => $question,
            'message' => 'Success'
        ], 200);
    }

    public function delete(Request $request, $id)
    {
        Question::find($id)->delete();
        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
