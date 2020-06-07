<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionsController extends Controller
{
    /**
     * Creates an instance of QuestionsController
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Question::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:questions,name',
            'statement' => 'required|string',
        ]);

        $question = Question::create($data);

        return response()->json([$question], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return $question;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'name' => [
                'sometimes', 'required', 'string', Rule::unique('questions')->ignore($question->id),
            ],
            'statement' => 'sometimes|required|string',
        ]);
        $question->update($data);

        return response([], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
