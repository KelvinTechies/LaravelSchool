<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Subjects Lists</h1>
              </div>
              <div class="col-sm-6" style="text-align:right;">
              <a href="{{url('admin/subject/add')}}" class='btn btn-primary'>Add New Subject</a>
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
                              <h3 class="card-title">Search Class</h3>
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
                                <label for="Status">Subject Type</label>
                                <select class='form-control' name='type'>

                                    <option value=''>---Select Type---</option>
                                    <option {{(Request::get('type')=='Theory')? "selected":""}} value='Theory'>Theory</option>
                                    <option {{(Request::get('type')=='Practical')? "selected":""}} value='Practical'>Practical</option>
                                </select>
                              </div>
                        
                              <div class="form-group col-md-3">
                                  <label for="exampleInputEmail1">Date</label>
                                  <input type="date" class="form-control"value="{{Request::get('date')}}" name='date'>
                                  
                                </div>
                              <div class="form-group col-md-3">
                                  <button class='btn btn-primary' type='submit' style="margin-top:30px;">Search</button>
                                  <a href='{{url("admin/subject")}}' class='btn btn-success' type='submit' style="margin-top:30px;">Clear</a>
                                  
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
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Subject Name</th>
                          <th>Subject Type</th>
                          <th>Status</th>
                          <th>Created By</th>
                          <th>Date Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($getRecord as $value)
                       <tr>
                           <td>{{ $value->id }}</td>
                           <td>{{ $value->name}}</td>
                           <td>{{ $value->type}}</td>
                           <td>
                               @if($value->status ==0 )
                                    Active
                               @else
                                    InActive
                               @endif
                            </td>
                           <td>{{ $value->created_by_name }}</td>
                           <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                           <td>
                                <a href='{{url('admin/subject/edit/'.$value->id)}}'class='btn btn-primary'>Edit</a>
                                <a href='{{url('admin/subject/delete/)'.$value->id)}}' class='btn btn-danger'>Delete</a>
        
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