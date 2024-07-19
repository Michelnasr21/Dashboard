@extends('dashboard')
@section('title')
   Edit Employee
@endsection 
@section('content')
  <div class="card emp-card">
     <div class="card-body">
         <form action="{{route('employees.update')}}" method="POST" enctype="multipart/form-data">
          <!-- <input type="text" name="_token" value = "{{ csrf_token() }}" class="form-control"> -->
           @csrf  
           <label>Select Department:</label>
           <select name="department_id" class="form-control">
               <option></option>
               @foreach($depts as $dept)
                  <option value="{{ $dept->id }}">{{ $dept->name  }}</option>
               @endforeach
           </select>
           <input type="hidden" name="employee_id"  class="form-control mb-3" value="{{ $employee->id}}">
           <label>Photo:</label><br>
           <img src="{{asset('images/employees/' . $employee->photo)}}" class="mb-2" style="width:90px;height:90px;">
           <input type="hidden" name="old_photo"  class="form-control mb-3" value="{{ $employee->photo}}">
           <input type="file" name="photo" class="form-control mb-3">
           <input type="text" name="name" placeholder="Employee Name" class="form-control mb-3" value="{{ $employee->name}}">
           <input type="text" name="phone" placeholder="Phone Number" class="form-control mb-3" value="{{ $employee->phone}}">
           <input type="text" name="title" placeholder="Job Title" class="form-control mb-3" value="{{ $employee->title}}">
           <button type="submit" class="btn btn-success mt-3">Save Changes</button>
         </form>
     </div> 
  </div>
@endsection