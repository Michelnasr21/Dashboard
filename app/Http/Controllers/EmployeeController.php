<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
class EmployeeController extends Controller
{
    public function index()
    {
        // $employees = Employee::orderBy('created_at','DESC')->get();
        $employees = Employee::orderBy('created_at','DESC')->paginate(4);
        return view('employees.index',compact('employees'));
    }

    public function create()
    {

        $depts = Department::get();
        return view('employees.create',compact('depts'));
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'photo' => 'image',
        'name' => 'required',
        'phone' => 'required',
        'title' => 'required',
        'department_id' => 'required',
    ]);

    // Upload Photo to Server
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $file_ext =  $file->getClientOriginalExtension();
        $file_name = time() . '-' . $request->name . '.' . $file_ext;
        $path = 'images/employees/';
        $file->move($path, $file_name);
    }

    // Save Data to Database
    $emp = new Employee();
    $emp->name = $request->name;
    $emp->phone = $request->phone;
    $emp->title = $request->title;
    $emp->photo = isset($file_name) ? $file_name : 'default.jpg';
    $emp->department_id = $request->department_id;
    $emp->save();

    return redirect(url('employees'))->with('success', 'Employee Created Successfully.');
}



    public function edit($id)
    {
        $depts = Department::get();
        $employee =  Employee::findOrFail($id);
        return view('employees.edit',compact('employee','depts'));
    }

    public function update(Request $request)
    {
        $file_name = '';
        $name = $request->name ;
        if($request->hasFile('photo')){
            $file_ext =  $request->photo->getClientOriginalExtension();
            $file_name = time() . '-'. $name. '.' . $file_ext ;
            $path = 'images/employees/';
            $request->photo->move($path,$file_name);
            unlink('images/employees/'. $request->old_photo);
        }else{
            $file_name = $request->old_photo;
        }

        $emp = Employee::find($request->employee_id);
        $emp->update([
            'name'    => $request->name ,
            'phone'   => $request->phone ,
            'title'   => $request->title,
            'photo'   => $file_name ,
            'department_id' => $request->department_id
        ]);

        return redirect(route('employees.show'));
    }

    public function destroy($id)
    {
        $emp =  Employee::find($id);
        @unlink('images/employees/'.$emp->photo);
        $emp->delete();
        return redirect(route('employees.show'));
    }

    public function find(Request $request)
    {
         $value =  '%' . $request->name . '%';
         $data = Employee::where('name','LIKE',$value)
                 ->orWhere('phone','LIKE',$value) 
                 ->get();

         if($data->count() > 0){

                foreach($data as $row){
                    echo  '<li style="list-style-type:none">' . $row->name . '</li><hr>';
                }

         }else{
            echo 'Not Found..';
         }

    }
}
