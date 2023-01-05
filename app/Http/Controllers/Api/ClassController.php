<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sClass;
use Illuminate\Support\Facades\Validator;
use DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=DB::table('s_classes')->get();
        return response()->json($data);
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
        $validator=Validator::make($request->all(),[
            'class_name' => 'required|unique:s_classes'
        ]);
        if ($validator->fails()) {
            return \response([
                'message'=>$validator->errors()->all(),
            ]);             
        }
        //
       try {

        $data= new sClass();

        $data->class_name=$request->class_name;

        $data->save();
        
       return \response([
            'message'=>'Class Created',
            'student'=>$data
        ]);
       }
       catch (Exception $e){
        return \redirect([
            'message'=>$e->getMessage(),
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
        //
        $validator=Validator::make($request->all(),[
            'class_name' => 'required|unique:s_classes'
        ]);
        if ($validator->fails()) {
            return \response([
                'message'=>$validator->errors()->all(),
            ]);             
        }
        //
       try {
        $data=sClass::where('id', '=',  $id)->first();
        $data->class_name=$request->class_name;
        $data->save();
       return \response([
            'message'=>'Class update SuccessFully',
            'student'=>$data
        ]);
       }
       catch (Exception $e){
        
        return \redirect([
            'message'=>$e->getMessage(),
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

            $delete=sClass::WHERE('id','=',$id)->delete();
            return response([
                'message'=>'Delete SuccessFully',
                'delete'=>$delete
            ]);

        }catch(Exception $e){
            return \redirect([
                'message'=>$e->getMessage(),
            ]);  
        }
    }
}
