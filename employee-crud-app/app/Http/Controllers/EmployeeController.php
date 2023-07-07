<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Employee::latest()->paginate(5);
        return view('index',compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_name'=>'required',
            'employee_email'=>'required|email|unique:employees',
            'employee_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|
            dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'employee_department'=>'required',
            'employee_role'=>'required'
        ]);

        $file_name=time() .'.'. request()->employee_image->getClientOriginalExtension();
        request()->employee_image->move(public_path('images'),$file_name);

        $employee=new Employee;
        $employee->employee_name=$request->employee_name;
        $employee->employee_email=$request->employee_email;
        $employee->employee_gender=$request->employee_gender;
        $employee->employee_image=$file_name;
        $employee->employee_department=$request->employee_department;
        $employee->employee_role=$request->employee_role;
        $employee->save();

        return redirect()->route('employees.index')->with('success','Employee data added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'employee_name'=>'required',
            'employee_email'=>'required|email',
            'employee_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|
            dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'employee_department'=>'required',
            'employee_role'=>'required'
        ]);

        $employee_image=$request->hidden_employee_image;

        if($request->employee_image!=''){
            $employee_image=time() .'.'. request()->employee_image->getClientOriginalExtension();
            request()->employee_image->move(public_path('images'),$employee_image);
        }

        $employee=Employee::find($request->hidden_id);
        $employee->employee_name=$request->employee_name;
        $employee->employee_email=$request->employee_email;
        $employee->employee_gender=$request->employee_gender;
        $employee->employee_image=$employee_image;
        $employee->employee_department=$request->employee_department;
        $employee->employee_role=$request->employee_role;
        $employee->save();

        return redirect()->route('employees.index')->with('success','Employee data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee data deleted successfully.');
    }

    public function showUploadForm()
    {
        return view('csv.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt,xlsx',
        ]);

        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        // Remove header row
        $header = array_shift($data);

        foreach ($data as $row) {
            $record = array_combine($header, $row);
            DB::table('employees')->insert($record);
        }

        return redirect()->back()->with('success', 'CSV data has been uploaded successfully.');
    }
}
