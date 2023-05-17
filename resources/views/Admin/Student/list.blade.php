<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Student Lists (Total:{{ $getRecord->total() }})</h1>
              </div>
              <div class="col-sm-6" style="text-align:right;">
              <a href="{{url('admin/students/add')}}" class='btn btn-primary'>Add New Student</a>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Search Student</h3>
                            </div>
                      <!-- form start -->
                      <form method="get" action=''>
                        <div class="card-body">
              <div class="row">
                          
                          <div class="form-group col-md-2">
                            
                            <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control"value="{{Request::get('name')}}" name='name' placeholder="Enter Name">
                          </div>
                          <div class="form-group col-md-2">
                            
                              <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control"value="{{Request::get('lstname')}}" name='lstname' placeholder="Enter Last Name">
                            </div>
                          <div class="form-group col-md-2">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control"value="{{Request::get('email')}}" name='email' placeholder="Enter Email">
                                
                              </div>
                              <div class="form-group col-md-2">
                            
                                  <label for="exampleInputEmail1">Admission Number </label>
                                <input type="text" class="form-control"value="{{Request::get('admission_num')}}" name='admission_num' placeholder="Enter Admission Number">
                                </div>
                              <div class="form-group col-md-2">
                                  <label for="exampleInputEmail1">Admission Date</label>
                                  <input type="date" class="form-control"value="{{Request::get('Admission_date')}}" name='Admission_date'>
                                  
                                </div>
                              <div class="form-group col-md-2">
                                  <button class='btn btn-primary' type='submit' style="margin-top:30px;">Search</button>
                                  <a href='{{url("admin/students")}}' class='btn btn-success' type='submit' style="margin-top:30px;">Clear</a>
                                  
                                </div>
                        </div>
                      </div>
                        
                      </form>
                    </div>
                    <!-- /.card -->
                 
                <!-- /.row -->


              <div class="col-md-12">
                <!-- /.card -->
    @include('_message')
                  <div class="card-body p-0" style="over-flow:auto;">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Profile Picture</th>                           
                          <th>Name</th>
                          <th>Email</th>
                          <th>Admission Number</th>
                          <th>Roll Numbe</th>
                          <th>Class</th>
                          <th>Gender</th>
                          <th>Birth Date</th>
                          <th>Caste</th>
                          <th>Religion </th>
                          <th>Mobile Number</th>
                          <th>Admission Date</th>
                          <th>Blood Group</th>
                          <th>Height</th>
                          <th>Weight</th>
                          <th>Status</th>                                                   
                          <th>Date Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forEach($getRecord as $value)
                        <tr>
                        <td>{{$value->id}}</td>
                        <td>
                          
                          {{-- @if(!empty({{$value->getProfile()}})) --}}
                        <img width="60" src='{{ $value->profile_pic ? asset('Uploads/Profile/'.$value->profile_pic) : asset('Uploads\default-img2.jpg')  }}' style="height:50px; width:50px; border-radius:50px;">
                            
                          {{-- @endif --}}
                        </td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->Admission_Number}}</td>
                        <td>{{$value->Ref_num}}</td>
                        <td>{{$value->class_name}}</td>
                        <td>{{$value->Gender}}</td>
                        <td>{{$value->Date_Of_Birth}}</td>
                        <td>{{$value->Caste}}</td>
                        <td>{{$value->Religion}}</td>
                        <td>{{$value->Phone}}</td>
                        <td>{{$value->Admission_date}}</td>
                        <td>{{$value->Blood_Grp}}</td>
                        <td>{{$value->Height}}</td>
                        <td>{{$value->Weight}}</td>
                        <td>{{($value->Status == 0 ) ? 'Active': 'Inactive'}}</td>
                        <td>{{date('d-m-Y h:i A', strtotime($value->created_at))}}</td>
                        <td style="min-width:200px;">
                        <a href='{{url('admin/students/edit/'.$value->id)}}'class='btn btn-primary btn-small'>Edit</a>
                        <a href='{{url('admin/students/delete/'.$value->id)}}' class='btn btn-danger btn-small'>Delete</a>

                        </td>
                        </tr>

                        @endforeach
                      </tbody>
                    </table>
                    
                  <div style="padding:10px; float:right">
                      {{ $getRecord->appends(request()->query())->links() }}
                      </div>                    
                    
                  </div>
                </div>
                <!-- /.card -->

            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

</x-admin>