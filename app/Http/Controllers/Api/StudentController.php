<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    return "I am Student";

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
        //

        try{
        //  $data=Student::create($request->all());

         $input=new Student();
         $input->class_id=$request->class_id;
         $input->section_id=$request->section_id;
         $input->phone=$request->phone;
         $input->name=$request->name;
         $input->email=$request->email;
         $input->password=bcrypt($request->password);
         $input->address=$request->address;
         $input->photo=$request->photo;
         $input->gender=$request->gender;
         $input->save();


         return response([
            "message"=>"Student SuccessFully Created",
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

        try{ 
        $data=Student::findorfail($id);
        $data->update($request->all());

            return response([

                "Message"=>"Student Update SuccessFully"
            ]);
        } catch(Exception $e){


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
        //

        Student::find($id)->delete();

        return response("Delete SuccessFully");
    }

    public function register(){
        

    }
}
