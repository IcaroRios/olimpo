<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Student;
use \App\Payment;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    
    
    public function index(){
        $students = Student::all();
        $activeStudents = $students->where('active');
        $today = Carbon::today();
        $newStudents = Student::whereDate('created_at',$today)->get();
        $numberNewtudents = sizeof($newStudents);
        $numberActiveStudents = sizeof($activeStudents);
        $pagantes = DB::table('students')
            ->where('students.active',1)   
            ->leftJoin('payments', 'students.id', '=', 'payments.user_id')
            ->whereMonth('payments.created_at','=', $today->month)
            ->get();
        /*
            $pagantes = DB::table('students')
            ->where('students.active',1)
            ->join('payments', function ($join) {
                $today = Carbon::today();
                $join->on('students.id', '=', 'payments.user_id')
                ->whereMonth('payments.created_at','=', $today->month);
            })
            ->get()
            ;
        */

        // dd($pagantes);
        //$teste = Student::whereNotIn('id', [1, 2, 3])
        //dd($tempagamento);
        return view('dashboard.index')->with(['students'=>$students,'numberActiveStudents'=>$numberActiveStudents,
        'numberNewStudents'=>$numberNewtudents ]);
    }
}
