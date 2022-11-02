<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Api\SubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*public function doValidate(SubjectRequest $request)
    {
        return "Success";
    }*/

    public function index()
    {
        $subject = Subject::all();
        return response()->json($subject);
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
        /*$validateData = $request->validate([
            'class_id' => 'require',
            'subject_name' => 'require |unique:subjects|max:25',
            'subject_code' => 'require |unique:sclasses|max:25',
            ]);*/

        $subject = Subject::create($request->all());

        /*$data = array();
        $data['subject_name'] = $request ->subject_name;
        $insert = DB::table('subjects')->insert($data);*/

        return  response('Subject Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
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
        $subject = Subject::find($id);
        $subject->update($request->all());
        /*$subject->class_id = $request->input('class_id');
        $subject->subject_name = $request->input('subject_name');
        $subject->subject_code = $request->input('subject_code');
        $subject->save();*/
        return response('Subject Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::where('id',$id)->delete();
        return response('Subject Delete Successfully');
    }
}
