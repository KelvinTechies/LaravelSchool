<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Class Time-Table</h1>
              </div>
              <div class="col-sm-6" style="text-align:right;">
              <a href="{{url('admin/class_time_table/add')}}" class='btn btn-primary'>Add New Class Time-Table</a>
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
                              <h3 class="card-title">Search Class Time-Table</h3>
                            </div>
                      <!-- form start -->
                      <form method="get" action=''>
                        <div class="card-body">
              <div class="row">
                          
                          <div class="form-group col-md-3">
                            
                            <label for="exampleInputEmail1">Class Name</label>
                            <select class='form-control getClass' required name='class_id'>
                                    <option value=''>---Select---</option>
                                
                                @foreach($getClass as $class)
                            <option {{  (Request::get('class_id')== $class->id ? 'selected' :"")}} value='{{ $class->id }}'>{{$class->Name}}</option>
                                    @endforeach
                            </select>
                          </div>
    
                          <div class="form-group col-md-3">
                            
                            <label for="exampleInputEmail1">Subject Name</label>
                            <select class='form-control getSubject'  name='subject_id'>
                                    <option value=''>---Select---</option>
                                @if(!empty($getSubject))
                                @foreach($getSubject as $subject)
                            <option  {{  (Request::get('subject_id')== $subject->subject_id ? 'selected' :"")}} value='{{ $subject->subject_id }}'>{{$subject->subject_name}}</option>

                                    @endforeach
                                    @endif
                            </select>
                          </div>
    
                        
                              {{-- <div class="form-group col-md-3">
                                  <label for="exampleInputEmail1">Date</label>
                                  <input type="date" class="form-control"value="{{Request::get('date')}}" name='date'>
                                  
                                </div> --}}
                              <div class="form-group col-md-3">
                                  <button class='btn btn-primary' type='submit' style="margin-top:30px;">Search</button>
                                  <a href='{{url("admin/class_time_table")}}' class='btn btn-success' type='submit' style="margin-top:30px;">Clear</a>
                                  
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
    @if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
    <form action='{{ url('admin/class_time_table/add') }}' method='post'>
        @csrf
                  <div class="card-body p-0">
                    <table class="table table-striped">
                        @php
                            $i=1;
                        @endphp
                      <thead>
                          <input type='hidden' name='class_id' value="{{ Request::get('class_id') }}">
                          <input type='hidden' name='subject_id' value="{{ Request::get('subject_id') }}">
                        <tr>
                          <th>Days</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Room Number</th>
                          {{-- <th>Date Created</th>
                          <th>Action</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($week as $value)
                       <tr>
                           <th>
                           <input type='hidden' name='timetable[{{$i}}][week_id] ' value=" {{ $value['week_id'] }}">
                               
                            {{ $value['week_name']}}
                        
                        </th>
                           <td><input type='time' name='timetable[{{$i}}][start_time]' value="{{ $value['start_time']  }}" class='form-control'></td>
                           <td><input type='time' name='timetable[{{$i}}][end_time]' value="{{ $value['end_time'] }}" class='form-control'></td>
                           <td><input type='text' name='timetable[{{$i}}][room_num]' value="{{ $value['room_number'] }}" class='form-control'></td>
                           @php $i++; @endphp
                           {{-- <td>
                                <a href='{{url('admin/assign_subject/edit/'.$value->id)}}'class='btn btn-primary'>Edit</a>
                                <a href='{{url('admin/assign_subject/edit-single/'.$value->id)}}'class='btn btn-primary'>Edit-Single</a>                            
                                <a href='{{url('admin/assign_subject/delete/)'.$value->id)}}' class='btn btn-danger'>Delete</a>
        
                                </td> --}}
                       </tr>
                       @endforeach
                      </tbody>
                    </table>
                    <div style='text-align:right; padding:5px;'>
                        <button class='btn btn-primary'>Submit</button>
                    </div>
                  {{-- <div style="padding:10px; float:right">
                      {{ $getRecord->appends(request()->query())->links() }}
                      </div>                     --}}
                    
                  </div>
                </div>
                <!-- /.card -->
            </form>
    @endif
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    
    </x-admin>


    <script type='text/javascript'>
    $('.getclass').change(function(){
    var class_id0 = $(this).val()
    $.ajax({
        url:"{{url('admin/class_time_table/getSubject')}}",
        type:"POST",
        data:{
            "_token":"{{csrf_token()}}",
            class_id:class_id,
            dataType:"json",
            success:function(response){
                $('.getSubject').html(response.html)
            }
        }
    })
})
    </script>