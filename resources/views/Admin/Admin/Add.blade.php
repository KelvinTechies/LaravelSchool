<x-admin>

        <!-- Content Wrapper. Contains page content -->
    {{-- <div class="content-wrapper"> --}}
          <!-- Content Header (Page header) -->
          <section class="content-header">
                <div class="">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                          <div class="container-fluid">
                            <div class="row mb-2">
                              <div class="col-sm-12">
                                <h1>Add New Admin</h1>
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
                                  
                                  <!-- form start -->
                                  <form method="POST" action=''>
                                      {{ csrf_field() }}
                                    <div class="card-body">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name='name' placeholder="Enter Name">
                                      </div>
                                      <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" name='email' placeholder="Enter Email">
                                       <p style='color:red;'> {{ $errors->first('email') }}</p>
                                            
                                          </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name='pwd' placeholder="Password">
                                      </div>
                                    </div>
                                    <!-- /.card-body -->
                    
                                    <div class="card-footer">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /.card -->
                              </div>
                              
                            </div>
                            <!-- /.row -->
                          </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                      </div>
          </section>
          <!-- /.content -->
  
  </x-admin>