<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $students = Student::paginate(5);
        return view('students.index')->with('students' , $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'avatar' => 'required'
        ]);

            

/*        $image = $request->avatar;

        $img_new = time() . $image->getClientOriginalName();

        $image->move('img' , $img_new);


           $student=Student::create([
           
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'avatar' => 'img/' . $img_new
            
           ]); 

            return redirect('students/')->with('success' , 'Data has been inserted');*/

        $image = $request->avatar;

        $image_new = time() . $image->getClientOriginalName();

        $image->move('img' , $image_new);

        $student = new Student;
        $student->firstname = $request->firstname; 
        $student->lastname  = $request->lastname;
        $student->email     = $request->email;
        $student->avatar    = 'img/' . $image_new;
        

        $student->save();

        return redirect('students/')->with('success' , 'Data has been inserted');

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
        $students = Student::find($id);
        return view('students.edit')->with('students' , $students);
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
        $this->validate($request,[

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email'
        ]);

        $student = Student::find($id);

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $image_new = time() . $avatar->getClientOriginalName();
            $avatar->move('img' , $image_new);
            $student->avatar = 'img/' . $image_new;
        }

        $student->firstname = $request->firstname; 
        $student->lastname  = $request->lastname;
        $student->email     = $request->email;
        $student->save();

        return redirect('students/')->with('success' , 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('students/')->with('success' , 'Data has been deleted');
    }
}
