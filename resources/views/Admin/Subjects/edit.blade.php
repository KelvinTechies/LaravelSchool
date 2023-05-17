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
                                <h1> Edit Subject</h1>
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
                                        <label for="exampleInputEmail1">Subject Name</label>
                                        <input type="text" class="form-control" name='name' value={{ $getRecord->name }} placeholder="Class Name">
                                      </div>
                                      <div class="form-group">
                                            <label for="Status">Subject Type</label>
                                            <select class='form-control' name='type'>

                                                <option value=''>---Select Type---</option>
                                                <option {{ ($getRecord->type=="Theory")? 'selected':"" }} value='Theory'>Theory</option>
                                                <option {{ ($getRecord->type=="Practical")? 'selected':"" }}  value='Practical'>Practical</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                                <label for="Status">Status</label>
                                                <select class='form-control' name='status'>
    
                                                    <option  {{ ($getRecord->type==0)? 'selected':"" }}   value='0'>Active</option>
                                                    <option  {{ ($getRecord->type==1)? 'selected':"" }}   value='1'>InActive</option>
                                                </select>
                                              </div>
                                          
                                    </div>
                                    <!-- /.card-body -->
                    
                                    <div class="card-footer">
                                      <button type="submit" class="btn btn-primary">Update</button>
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