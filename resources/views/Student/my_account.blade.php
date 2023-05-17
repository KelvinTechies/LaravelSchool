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
                                  @include('_message')
                                  <!-- form start -->
                                  <form method="POST" action='' enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class='row'>
                                      <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">First Name<span style='color:red'>*</label></span>
                                      <input type="text" class="form-control" required value="{{$getRecord->name}}"  name='name' placeholder="Enter Name">
                                      </div>
                                      <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Last Name<span style='color:red'>*</label></span>
                                            <input type="text" value="{{$getRecord->Last_Name}}"  class="form-control"  required name='lst_name' placeholder="Enter Name">
                                          </div>
                                         
                                                      <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1">Gender<span style='color:red'>*</label></span>
                                                              
                                                                <select class="form-control" required name='gender'>
                                                                <option Value=''>---Select Gender---</option>
                                                                <option {{$getRecord->Gender =='Male'? 'selected': ""}} Value='Male'>Male</option>
                                                                <option {{ $getRecord->Gender =='Female'? 'selected': ""}} Value='Female'>Female</option>
                                                                <option {{ $getRecord->Gender =='Others'? 'selected': ""}} Value='Others'>Others</option>
                                                            </select>
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                    <label for="exampleInputEmail1">Birth Date<span style='color:red'>*</label></span>
                                                                    <input type="date" value="{{$getRecord->Date_Of_Birth}}"  class="form-control" required name='dob' placeholder="Roll Number">
                                                                  </div>
                                                                  <div class="form-group col-md-6">
                                                                        <label for="exampleInputEmail1">Caste<span style='color:red'>*</label></span>
                                                                  <input type="text" value="{{$getRecord->Caste}}"  class="form-control"value='{{old('caste')}}' required name='caste' placeholder="Caste ">
                                                                      </div>
                                                                      <div class="form-group col-md-6">
                                                                            <label for="exampleInputEmail1">Religion <span style='color:red'>*</label></span>
                                                                      <input type="text"value="{{$getRecord->Religion}}"  class="form-control" required value='{{old('religion')}}' name='religion' placeholder="Roll Number">
                                                                          </div>
                                                                          <div class="form-group col-md-6">
                                                                                <label for="exampleInputEmail1">Mobile Number <span style='color:red'>*</label></span>
                                                                          <input type="text" value="{{$getRecord->Phone}}" class="form-control"value='{{old('fone')}}' required name='fone' placeholder="Mobile Number">
                                                                              </div>
                                                                             
                                                                                  <div class="form-group col-md-6">Profile Picture <span style='color:red'>*</label></span>
                                                                                  <input type="file" class="form-control"value='{{old('pic')}}' required name='pic'>
                                                                                  <img width="60" src='{{asset('Uploads/Profile/'.$getRecord->profile_pic)}}'>
                                                                                  
                                                                                      </div>

                                                                                      
                                                                                    
                                                                                     
                                                                                          <div class="form-group col-md-6">
                                                                                                <label for="exampleInputEmail1">  Blood Group <span style='color:red'>*</label></span>
                                                                                                <input type="text" value="{{$getRecord->Blood_Grp}}" class="form-control"value='{{old('blood_grp')}}' required name='blood_grp' placeholder='Blood Group'>
                                                                                              </div>
                                                                                              <div class="form-group col-md-6">
                                                                                                    <label for="exampleInputEmail1"> Height <span style='color:red'>*</label></span>
                                                                                                    <input type="text"value="{{$getRecord->Height}}"  class="form-control"value='{{old('height')}}' required name='height' placeholder='Height'>
                                                                                                  </div>
                                                                                                  <div class="form-group col-md-6">
                                                                                                        <label for="exampleInputEmail1"> Weight <span style='color:red'>*</label></span>
                                                                                                        <input type="text" value="{{$getRecord->Weight}}"  class="form-control"value='{{old('weight')}}' required name='weight' placeholder='Weight'>
                                                                                                      </div>
                                    </div>
                                      <div class="form-group">
                                            <label for="exampleInputEmail1">Email<span style='color:red'>*</label></span>
                                            <input type="email" class="form-control" name='email' value="{{$getRecord->email}}" placeholder="Enter Email">
                                       <p style='color:red;'> {{ $errors->first('email') }}</p>
                                            
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