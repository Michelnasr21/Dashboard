<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('back/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div>
          
             <input class="form-control form-control-sidebar" type="search" id="search"
              placeholder="Search" aria-label="Search">
          
          <!-- <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div> -->
        </div>
      </div>
      <div id="result" class="search-result"></div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('employees.show')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Employees
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    @section('js')
    <script>
       $(document).ready(function (){

         $('#search').keyup(function (){
            var value = $('#search').val();
            // var email = $('#email').val();
            // var phone = $('#phone').val();
            if(value !==''){
                  $.ajax({
                  url: "{{ route('employees.search') }}" ,
                  type:"GET",
                  data:{
                    'name':value,
                    // 'email':email,
                    // 'phone':phone
                  },
                  success:function(response){
                    $('#result').html(response);
                  }
                });
            }else{
              $('#result').hide();
            } 
         });
          
       });
    </script>
    @endsection