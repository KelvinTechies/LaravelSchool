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
                                <h1>Edit Teacher</h1>
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
                                  <form method="POST" action='' enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class='row'>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">First Name<span style='color:red'>*</label></span>
                                        <input type="text" class="form-control" value="{{$getRecord->name}}" required name='name' placeholder="Enter Name">
                                      </div>
                                      <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Last Name<span style='color:red'>*</label></span>
                                            <input type="text" class="form-control" value="{{$getRecord->Last_Name}}" required name='lst_name' placeholder="Enter Name">
                                          </div>
                                          <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Marital Status<span style='color:red'>*</label></span>
                                                <input type="text" class="form-control" value="{{$getRecord->Marital_Status}}" required name='marital' placeholder="Occupation">
                                              </div>
                                                      <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1">Gender<span style='color:red'>*</label></span>
                                                              
                                                                <select class="form-control" required name='gender'>
                                                                <option Value=''>---Select Gender---</option>
                                                                <option {{$getRecord->Gender =='Male'? 'selected': ""}} Value='Male'>Male</option>
                                                                <option {{$getRecord->Gender =='Female'? 'selected': ""}} Value='Female'>Female</option>
                                                                <option {{ $getRecord->Gender =='Others'? 'selected': ""}} Value='Others'>Others</option>
                                                            </select>
                                                              </div>
                                                             
                                                                      <div class="form-group col-md-6">
                                                                            <label style="display:block;" for="exampleInputEmail1">Current Address <span style='color:red'>*</label></span>
                                                                            <textarea name='address1' style="width:100%; height:100px;" value="{{$getRecord->Adress}}" placeholder="Current Address"></textarea>
                                                                          </div>
                                                                          <div class="form-group col-md-6">
                                                                                <label style="display:block;" for="exampleInputEmail1">Permanent Address <span style='color:red'>*</label></span>
                                                                        <textarea name='address2' style="width:100%; height:100px;" value="{{$getRecord->Permanent_Address}}" placeholder="Permanent Address"></textarea>
                                                                              </div>
                                                                          <div class="form-group col-md-6">
                                                                                <label for="exampleInputEmail1">Mobile Number <span style='color:red'>*</label></span>
                                                                          <input type="text" class="form-control"value='{{old('fone', $getRecord->Phone)}}' required name='fone' placeholder="Mobile Number">
                                                                              </div>
                                                                              <div class="form-group col-md-6">
                                                                                    <label for="exampleInputEmail1">Date Joining <span style='color:red'>*</label></span>
                                                                              <input type="date" class="form-control"value='{{old('dateJoined', $getRecord->Date_joined)}}' required name='dateJoined'>
                                                                                  </div>
                                                                                  <div class="form-group col-md-6">
                                                                                        <label for="exampleInputEmail1">Date Of Birth <span style='color:red'>*</label></span>
                                                                                  <input type="date" class="form-control"value='{{old('dob', $getRecord->Date_Of_Birth)}}' required name='dob' >
                                                                                      </div>
                                                                              <div class="form-group col-md-6">
                                                                                    <label style="display:block;" for="exampleInputEmail1">Qualification <span style='color:red'>*</label></span>
                                                                              <textarea name='Qualification' style="width:100%; height:100px;" placeholder="Qualification">{{$getRecord->Qualification}}</textarea>
                                                                                  </div>
                                                                                  <div class="form-group col-md-6">
                                                                                        <label style="display:block;" style="display:block;" for="exampleInputEmail1">Work Experience <span style='color:red'>*</label></span>
                                                                                <textarea name='experience' style="width:100%; height:100px;"  placeholder="Work Experience">{{$getRecord->Work_Experience}}</textarea>
                                                                                      </div>
                                                                                      <div class="form-group col-md-6">
                                                                                            <label style="display:block;" style="display:block;" for="exampleInputEmail1">Note  <span style='color:red'>*</label></span>
                                                                                    <textarea name='Note' style="width:100%; height:100px;"  placeholder="Note">{{$getRecord->Note}}</textarea>
                                                                                          </div>
                                                                                  <div class="form-group col-md-6">Profile Picture <span style='color:red'>*</label></span>
                                                                                  <input type="file" class="form-control"value='{{old('pic')}}' required name='pic'>
                        <img width="60" src='{{ $getRecord->profile_pic ? asset('Uploads/Profile/'.$getRecord->profile_pic) : asset('Uploads\default-img2.jpg')  }}' width="60">
                                                                                  
                                                                                      </div>
                                                                                     
                                                                                         
                                                                                                      <div class="form-group col-md-6">
                                                                                                            <label for="exampleInputEmail1">Status<span style='color:red'>*</label></span>
                                                                                                              
                                                                                                                <select class="form-control" required name='status'>
                                                                                                                <option Value=''>---Select Status---</option>
                                                                                                                <option {{$getRecord->Status == 0 ? 'selected': ""}} Value='0'>Active</option>
                                                                                                                <option {{ $getRecord->Status == 1 ? 'selected': ""}} Value='1'>Inactive</option>
                                                                                                            </select>
                                                                                                              </div>    
                                                                                      <hr>
                                    </div>
                                      <div class="form-group">
                                            <label for="exampleInputEmail1">Email<span style='color:red'>*</label></span>
                                      <input type="email" class="form-control" value="{{$getRecord->email}}" name='email' placeholder="Enter Email">
                                       <p style='color:red;'> {{ $errors->first('email') }}</p>
                                            
                                          </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Password<span style='color:red'>*</label></span>
                                        <input type="password" class="form-control" name='pwd' placeholder="Password">
                                        <p>Do you want to change password? if so, please do</p>
                                        
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