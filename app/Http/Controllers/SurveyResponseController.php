<?php

namespace App\Http\Controllers;

use App\SurveyResponse;
use http\Env\Response;
use Illuminate\Http\Request;

class SurveyResponseController extends Controller
{
    /**
     * Creates an instance of SurveyResponseController
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
        return SurveyResponse::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $survey_response = SurveyResponse::create([
            'survey_id' => request('survey_id'),
            'question_id'  => request('question_id'),
            'survey_location_id'  => request('survey_location_id'),
            'response_option_id'  => request('response_option_id'),
            'custom_response'  => request('custom_response'),
        ]);
        */
        $data = $request->validate([
            'survey_id' => 'integer|required',
            'question_id'=> 'integer|required',
            'survey_location_id'=> 'integer|required',
            'response_option_id'=> 'integer|required',
            'custom_response'=> 'sometimes|string'
        ]);
        $survey_response = SurveyResponse::create($data);

        return response()->json([$survey_response], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param SurveyResponse $survey_response
     * @return SurveyResponse
     */
    public function show(SurveyResponse $survey_response)
    {
        return  $survey_response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param SurveyResponse $survey_response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyResponse $survey_response)
    {
        $data = $request->validate([
            'survey_id' => 'integer|required',
            'question_id'=> 'integer|required',
            'survey_location_id'=> 'integer|required',
            'response_option_id'=> 'integer|required',
            'custom_response'=> 'sometimes|string'
        ]);
        $survey_response->update($data);

        return response(['message'=>'your response was updated'], 200);
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
