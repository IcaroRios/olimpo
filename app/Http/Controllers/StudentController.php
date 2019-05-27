<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\Models\Activity;

class StudentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.student.studentForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $request['medicine'] =             (!isset( $request['medicine']) ) ? False : True;
         try{
            Student::create($request);
            $activity = Activity::all()->last();
        } catch(\Illuminate\Database\QueryException $ex){ 
           return redirect(URL::previous())->with('error','Erro Inesperado.');
        }
        return redirect(URL::previous())->with('success','salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('dashboard.student.studentShow',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('dashboard.student.studentEdit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'=>'required',
            'CPF'=> 'required',
            'RG'=> 'required',
            'birthDate'=> 'required',
            'cellphone'=> 'required',
            'city'=> 'required',
            'street'=> 'required',
            'neighborhood'=> 'required',
            'CEP'=> 'required',
            'paymentAmount'=> 'required',
            'paymentDay'=> 'required'
        ]);
        $request = $request->all();
        $request['medicine'] =             (!isset( $request['medicine']) ) ? 0 : 1;
        $student->update($request);
        try {
            if($student->update($request)){
                return redirect(URL::previous())->with(['success' => 'Aluno Editado!']);
                $activity = Activity::all()->last();
            }
            return redirect(URL::previous())->with(['error' => 'Não pode editar o Aluno!']);
        }catch (\Illuminate\Database\QueryException $e) {
            return redirect(URL::previous())->with(['error' => 'Erro grave']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
