<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Parent Lists (Total:{{ $getRecord->total() }})</h1>
              </div>
              <div class="col-sm-6" style="text-align:right;">
              <a href="{{url('admin/Parents/add')}}" class='btn btn-primary'>Add New Parent</a>
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
                              <h3 class="card-title">Search Parent</h3>
                            </div>
                      <!-- form start -->
                      <form method="get" action=''>
                        <div class="card-body">
              <div class="row">
                          
                          <div class="form-group col-md-3">
                            
                            <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control"value="{{Request::get('name')}}" name='name' placeholder="Enter Name">
                          </div>
                          <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control"value="{{Request::get('email')}}" name='email' placeholder="Enter Email">
                                
                              </div>
                              <div class="form-group col-md-3">
                                  <label for="exampleInputEmail1">Mobile Number</label>
                                  <input type="text" class="form-control"value="{{Request::get('Phone')}}" name='Phone'>
                                  
                                </div>
                              <div class="form-group col-md-3">
                                  <button class='btn btn-primary' type='submit' style="margin-top:30px;">Search</button>
                                  <a href='{{url("admin/Parents")}}' class='btn btn-success' type='submit' style="margin-top:30px;">Clear</a>
                                  
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
                          <th>Profile pic</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Mobile Number</th>
                          <th>Address</th>
                          <th>Occupation</th>
                          <th>Status</th>
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
                        <td>{{$value->Gender}}</td>
                        <td>{{$value->Phone}}</td>
                        <td>{{$value->Address}}</td>
                        <td>{{$value->Occupation}}</td>
                        <td>{{($value->Status == 0 ) ? 'Active': 'Inactive'}}</td>
                        <td>{{date('d-m-Y h:i A', strtotime($value->created_at))}}</td>
                        <td  class='d-flex justify-content-between'>
                        <a href='{{url('admin/Parents/edit/'.$value->id)}}'class='btn btn-primary btn-small'>Edit</a>
                        <a href='{{url('admin/Parents/delete/'.$value->id)}}' class='btn btn-danger btn-small'>Delete</a>
                        <a href='{{url('admin/Parents/my-student/'.$value->id)}}' class='btn btn-primary btn-small'>My Student</a>

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