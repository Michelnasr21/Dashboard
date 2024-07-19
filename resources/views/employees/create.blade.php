@extends('dashboard')
@section('title')
   Create Employee
@endsection 
@section('content')
  <div class="card emp-card">
     <div class="card-body">
          <form action="{{route('employees.store')}}" method="POST"  enctype="multipart/form-data"> 
          <!-- <input type="text" name="_token" value = "{{ csrf_token() }}" class="form-control"> -->
           @csrf  
          
           <label>Select Department:</label>
           <select name="department_id" class="form-control">
               <option></option>
               @foreach($depts as $dept)
                  <option value="{{ $dept->id }}">{{ $dept->name  }}</option>
               @endforeach
           </select>
           <label>Photo:</label><br>
           <input type="file" name="photo" class="form-control mb-3 required"> 
           <div class="error"></div>
           <input type="text" name="name" placeholder="Employee Name" class="form-control mb-3 required">
           <div class="error"></div>
           <input type="text" name="phone" placeholder="Phone Number" class="form-control mb-3 required">
           <div class="error"></div>
           <input type="text" name="title" placeholder="Job Title" class="form-control mb-3 required">
           <div class="error"></div>
           <button type="submit" class="btn btn-success mt-3">Create Employee</button>
         </form>
     </div> 
  </div>
@endsection

@section('js')
<script>
   $(document).ready(function (){
      
      $('form').submit(function (event){
            $('.required').each(function (){
               if($(this).val() == ''){
                  var txt = $(this).attr('placeholder') + ' is required';
                  $(this).next('.error').html(txt).css({'color':'red'});
                 event.preventDefault();
              }
          
         });
      });
   });
 
</script>
@endsection