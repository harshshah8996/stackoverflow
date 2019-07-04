<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{
    public function index(Request $request)
    {
        $answer = Answer::whereNotIn('user_id', [$request->user()->id])->get();

        return response()->json([
            'data' => $answer,
            'message' => 'Success'
        ], 200);
    }

    public function show(Request $request)
    {
        $answer = Answer::where(
            'user_id',
            $request->user()->id
        )->get();

        return response()->json([
            'data' => $answer,
            'message' => 'Success'
        ], 200);
    }

    public function view(Request $request, $id)
    {
        $answer = Answer::where([
            ['user_id', $request->user()->id],
            ['id', $id]
        ])->get();

        return response()->json([
            'data' => $answer,
            'message' => 'Success'
        ], 200);
    }

    public function store(Request $request)
    {
        $answer = Answer::create([
            'question_id' => $request->get('question_id'),
            'description' => $request->get('description'),
            'user_id' => $request->user()->id
        ]);

        return response()->json([
            'data' => $answer,
            'message' => 'Success'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $answer = Answer::find($id);
        $answer->description = $request->get('description');
        $answer->save();

        return response()->json([
            'data' => $answer,
            'message' => 'Success'
        ], 200);
    }

    public function delete(Request $request, $id)
    {
        Answer::find($id)->delete();
        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
