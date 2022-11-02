<?php

namespace App\Http\Controllers\Api;

use App\Models\Sclasses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // query builder
        $sclass = DB::table('sclasses')->get();
        return response()->json($sclass);
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
        //$validatedData = $request->validate([
            //'\App\Http\Controllers\Api\SclassController' => 'require |unique:sclasses|max:25'
            //'class_name' => 'require |unique:sclasses|max:25'
        //]);

        $data = array();
        $data['class_name'] = $request ->class_name;
        $insert = DB::table('sclasses')->insert($data);

        return response('Insert Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $show = DB::table('sclasses')->where('id',$id)->first();
        return  response()->json($show);
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
        $data = array();
        $data['class_name'] = $request ->class_name;
        $insert = DB::table('sclasses')->where('id',$id)->update($data);

        return response('Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        DB::table('sclasses')->where('id',$id)->delete();

        return response(' Sclass Delete Successfully');
    }
}
