<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Admin Lists (Total:{{ $getRecord->total() }})</h1>
              </div>
              <div class="col-sm-6" style="text-align:right;">
              <a href="{{url('admin-add')}}" class='btn btn-primary'>Add New Admin</a>
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
                              <h3 class="card-title">Search Admin</h3>
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
                                  <label for="exampleInputEmail1">Date</label>
                                  <input type="date" class="form-control"value="{{Request::get('date')}}" name='date'>
                                  
                                </div>
                              <div class="form-group col-md-3">
                                  <button class='btn btn-primary' type='submit' style="margin-top:30px;">Search</button>
                                  <a href='{{url("admin-list")}}' class='btn btn-success' type='submit' style="margin-top:30px;">Clear</a>
                                  
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
                {{-- <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Admin Lists (Total:{{ $getRecord->total() }})</h3>
                  </div> --}}
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Date Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forEach($getRecord as $value)
                        <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{date('d-m-Y h:i A', strtotime($value->created_at))}}</td>
                        <td>
                        <a href='{{url('admin-edit/'.$value->id)}}'class='btn btn-primary'>Edit</a>
                        <a href='{{url('')}}' class='btn btn-danger'>Delete</a>

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