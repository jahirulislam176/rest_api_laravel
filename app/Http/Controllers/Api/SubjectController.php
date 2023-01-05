<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Subject::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_id' => 'required|unique:subjects',
            'subject_name' => 'required|unique:subjects',
            'subject_code' => 'required|unique:subjects',
        ]);
 
        if ($validator->fails()) {
            return response([
                'message'=>$validator->errors()->all(),
            ]);
        }
        //
    try{
    $input= new Subject();
    $input->class_id=$request->class_id;
    $input->subject_name=$request->subject_name;
    $input->subject_code=$request->subject_code;
    $input->save();
    return response([
        "message"=>"Subject Created Succesfully",
        'data'=> $input
    ]);
}catch(Exception $e){
    
    return response([

        "message"=>$e->getMessage(),

    ]);
}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $validator = Validator::make($request->all(), [
            'class_id' => 'required|unique:subjects',
            'subject_name' => 'required|unique:subjects',
            'subject_code' => 'required|unique:subjects',
        ]);
 
        if ($validator->fails()) {
            return response([
                'message'=>$validator->errors()->all(),
            ]);
        }
        //
    try{
    $input=Subject::where('id','=',$id)->first();

    $input->class_id=$request->class_id;

    $input->subject_name=$request->subject_name;

    $input->subject_code=$request->subject_code;

    $input->save();

    return response([
        "message"=>"Subject Update Succesfully",
        'data'=> $input
    ]);
}catch(Exception $e){

    return response([
        "message"=>$e->getMessage(),
    ]);
}


}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $delete=Subject::find($id)->delete();
            return response([
                'message'=>"Subject Delete Succesfully",
                'delete'=>$delete
            ]);
        }catch(Exception $e){
            return response([

                "message"=>$e->getMessage()

            ]);
        }
    }
}
