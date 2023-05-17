<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Parent Student-Lists</h1>
              </div>
              <div class="col-sm-6" style="text-align:right;">
              <a href="{{url('admin/Parents/add')}}" class='btn btn-primary'>Add New Parent</a>
                </ol>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          <div class="container-fluid">
            
              <div class="row">
                  <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Search Student</h3>
                            </div>
                      <!-- form start -->
                      <form method="get" action=''>
                        <div class="card-body">
              <div class="row">
                    <div class="form-group col-md-3">
                            
                            <label for="exampleInputEmail1">Student ID</label>
                          <input type="text" class="form-control"value="{{Request::get('stuId')}}" name='stuId' placeholder="Enter Student Id">
                          </div>         
                          <div class="form-group col-md-2">
                            
                            <label for="exampleInputEmail1">First Name</label>
                          <input type="text" class="form-control"value="{{Request::get('name')}}" name='name' placeholder="Enter First Name">
                          </div>
                          <div class="form-group col-md-2">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control"value="{{Request::get('lstnme')}}" name='lstnme'placeholder="Enter Last Name">
                                
                              </div>
                          <div class="form-group col-md-2">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control"value="{{Request::get('email')}}" name='email' placeholder="Enter Email">
                                
                              </div>
                            
                              <div class="form-group col-md-2">
                                  <button class='btn btn-primary' type='submit' style="margin-top:30px;">Search</button>
                                  <a href='{{url("/admin/Parents/my-student/".$parent_id)}}' class='btn btn-success' type='submit' style="margin-top:30px;">Clear</a>
                                  
                                </div>
                        </div>
                      </div>
                        
                      </form>
                    </div>


              <div class="col-md-12">
    @include('_message')
    @if(!empty($getSearchStudent))
                    <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Student Lists</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0" style="over-flow:auto;">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Profile pic</th>
                          <th>Student Name</th>
                          <th>Email</th>
                          <th>Parent Name</th>
                          <th>Gender</th>
                          <th>Mobile Number</th>
                          <th>Date Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forEach($getSearchStudent as $value)
                        <tr>
                        <td>{{$value->id}}</td>
                        <td><img width="60" src='{{ $value->profile_pic ? asset('Uploads/Profile/'.$value->profile_pic) : asset('Uploads\default-img2.jpg')  }}' style="height:50px; width:50px; border-radius:50px;"></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->parent_name}}</td>
                        <td>{{$value->Gender}}</td>
                        <td>{{$value->Phone}}</td>                      
                        <td>{{date('d-m-Y h:i A', strtotime($value->created_at))}}</td>
                        <td  class='d-flex justify-content-between'>
                        <a href='{{url('admin/Parents/assign_student_parent/'.$value->id.'/'.$parent_id)}}' class='btn btn-primary btn-small'>Add Student to Parent</a>

                        </td>
                        </tr>

                        @endforeach
                      </tbody>
                    </table>
                @endif
                <div class="card">
                        
                        <div class="card-body p-0" style="over-flow:auto;">
                          <table class="table table-striped">
                        <div class="card">
                                <div class="card-header">
                                  <h3 class="card-title">Parent Student-Lists</h3>
                                </div>
                             <thead>
                                <tr>
                                        <th>#</th>
                                        <th>Profile pic</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Parent Name</th>
                                        <th>Gender</th>
                                        <th>Mobile Number</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @forEach($getRecord as $value)
                                      <tr>
                                      <td>{{$value->id}}</td>
                                      <td><img width="60" src='{{ $value->profile_pic ? asset('Uploads/Profile/'.$value->profile_pic) : asset('Uploads\default-img2.jpg')  }}' style="height:50px; width:50px; border-radius:50px;"></td>
                                      <td>{{$value->name}}</td>
                                      <td>{{$value->email}}</td>
                                      <td>{{$value->parent_name}}</td>
                                      <td>{{$value->Gender}}</td>
                                      <td>{{$value->Phone}}</td>                      
                                      <td>{{date('d-m-Y h:i A', strtotime($value->created_at))}}</td>
                                      <td  class='d-flex justify-content-between'>
                                      <a href='{{url('admin/Parents/assign_student_parent_delete/'.$value->id)}}' class='btn btn-danger btn-small'>Delete</a>
              
                                      </td>
                                      </tr>
              
                                      @endforeach
                    </div>
                  </div>
  
          </div>
        {{-- </section> --}}

</x-admin>