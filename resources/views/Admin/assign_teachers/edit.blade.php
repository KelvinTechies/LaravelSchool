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
                          <h1>Edit Assign Teacher</h1>
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
                                  <label for="exampleInputEmail1">Class Name</label>
                                  <select class='form-control' name='class_id'>
                                      <option value=''>---Select Class---</option>
                                      @foreach($getClass as $class)
                                      <option {{ $getRecord->Class_id ==$class->id ? 'Selected' : "" }} value='{{$class->id}}'>{{$class->Name}}</option>
                                      @endforeach.
                                  </select>
                                </div>
                                <div class="form-group">
                                
                                      <label for="Status">Teacher Name</label>
      
                                      @foreach($getTeacher as $Teacher)
                                      @php

                                      $checked = "";
  
                                    @endphp
                                      @foreach($getAssignTeacherId as $teacherID)

                                        @if($teacherID->Teacher_id == $Teacher->id)
                                        @php

                                        $checked = "checked";
                                      @endphp
                                      @endif
                                      
                                      @endforeach
                                <div>
                                      <input {{ $checked }} type='checkbox' value="{{$Teacher->id}}" name='teacher_id[]'>{{$Teacher->name}} {{$Teacher->Last_Name}}
                                </div>
                                      
                                      @endforeach
                                    </div>
                                    <div class="form-group">
                                          <label for="Status">Status</label>
                                          <select class='form-control' name='status'>

                                              <option {{ $getRecord->Status ==0 ? 'Selected' : "" }} value='0'>Active</option>
                                              <option {{ $getRecord->Status ==1? 'Selected' : "" }} value='1'>InActive</option>
                                          </select>
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