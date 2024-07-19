
@extends('dashboard')
@section('title')
  Show Employees
@endsection
@section('content')


<div class="card">
    <div class="card-header">
      <a href="{{route('employees.create')}}" class="btn btn-primary">Create New Employee</a>
    </div>
    <div class="card-body">
      <!-- CRUD => [CREATE , READ , UPDATE , DELETE ] --> 
       @if(Session()->has('success'))
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
         {{ Session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            
       @endif
        <table class="table table-bordered">
            <thead>
               <tr>
                <th>#</th>
                 <th>Employee Name</th>
                 <th>Photo</th>
                 <th>Job Title</th>
                 <th>Phone Number</th>
                 <th>Department</th>
                 <th class="text-center">Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php $s = 1 ?>
               <!-- @php @endphp  -->
               @foreach($employees as $emp)
                  <tr>
                    <td>{{ $s++ }}</td>
                    <td>{{ $emp->name }}</td>
                    <td class="text-center">
                   
                      @if($emp->photo != 'NULL')
                        <img src="{{asset('images/employees/' . $emp->photo)}}" style="width:70px;height:70px">
                      @else 
                        <img src="{{asset('images/employees/default.jpg')}}" style="width:70px;height:70px">
                      @endif
                      
                    </td>
                    <td>{{ $emp->title }}</td>
                    <td>{{ $emp->phone }}</td>
                    <td>{{ $emp->department->name }}</td>
                    <td class="text-center">
                       <a href="{{route('employees.edit',$emp->id)}}" class="btn btn-primary btn-sm">Edit</a>
                       <a href="{{route('employees.destroy',$emp->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
               @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $employees->links() }}
        </div>
    </div>
</div>

@endsection