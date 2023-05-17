<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Exam Schedule </h1>
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
                              <h3 class="card-title">Search Exam</h3>
                            </div>
                      <!-- form start -->
                      <form method="get" action=''>
                        <div class="card-body">
              <div class="row">
                          
                          <div class="form-group col-md-3">
                            
                            <label for="exampleInputEmail1">Exam Name</label>
                            <select name='exam_id' class='form-control'>
                                <option value=''>--select--</option>
                                @foreach($getExam as $exam)
                            <option {{(Request::get('exam_id') ==  $exam->id ) ? "selected" : "" }} value='{{$exam->id }}'>{{ $exam->name  }}</option>

                                @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                            
                                <label for="exampleInputEmail1">Class Name</label>
                                <select name='class_id' class='form-control'>
                                    <option value=''>--select--</option>
                                @foreach($getClass as $class)
                                <option {{(Request::get('class_id') ==  $class->id)  ? "selected" : "" }} value='{{ $class->id }}'>{{$class->Name}}</option>

                                @endforeach
                                    
                                </select>
                              </div>
                              <div class="form-group col-md-3">
                                  <button class='btn btn-primary' type='submit' style="margin-top:30px;">Search</button>
                                  <a href='{{url("admin/Examination/exam_schedule")}}' class='btn btn-success' type='submit' style="margin-top:30px;">Clear</a>
                                  
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
    @if(!empty($getRecord))
              <form action ="{{url('admin/Examination/exam_schedule/insert')}}" method='post'>
                @csrf
                <input type='hidden' name='exam_id' value="{{ Request::get('exam_id') }}">
                <input type='hidden' name='class_id' value="{{ Request::get('class_id') }}">
                {{-- <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Admin Lists (Total:{{ $getRecord->total() }})</h3>
                  </div> --}}
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Subject Name</th>
                          <th>Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Room  Number</th>
                          <th>Full Marks</th>
                          <th>Passing Marks</th>
                        </tr>
                      </thead>
                      <tbody>
                          @php
                            $i=1;
                          @endphp
                        @forEach($getRecord as $value)
                        <tr>
                        <td>{{$value['subject_name']}}
                                <input type='hidden' class='form-control' value="{{$value['subject_id']}}" name='schedule[{{$i}}][subject_id]'
                        </td>
                        <td><input type='date' class='form-control' value="{{$value['exam_date']}}" name='schedule[{{$i}}][exam_date]'></td>
                        <td><input type='time' class='form-control' value="{{$value['exam_start_time']}}"  name='schedule[{{$i}}][exam_start_time]'></td>
                        <td><input type='time' class='form-control' value="{{$value['exam_end_time']}}"  name='schedule[{{$i}}][exam_end_time]'></td>
                        <td><input type='text' class='form-control' value="{{$value['exam_rum_num']}}"  name='schedule[{{$i}}][exam_rum_num]'></td>
                        <td><input type='text' class='form-control' value="{{$value['exam_full_mark']}}"  name='schedule[{{$i}}][exam_full_mark]'></td>
                        <td><input type='text' class='form-control' value="{{$value['exam_pass_mark']}}"  name='schedule[{{$i}}][exam_pass_mark]'></td>
                        {{-- <td>{{date('d-m-Y h:i A', strtotime($value->created_at))}}</td>
                        <td>
                        <a href='{{url('admin/Examination/exam/'.$value->id)}}'class='btn btn-primary'>Edit</a>
                        <a href='{{url('admin/Examination/exam/'.$value->id)}}' class='btn btn-danger'>Delete</a>

                        </td> --}}
                        </tr>
                        @php
                        $i++;
                      @endphp
                        @endforeach
                      </tbody>
                    </table>
                    <div style='text-align:right; padding:5px;'>
                            <button class='btn btn-primary'>Submit</button>
                        </div>
                    </form>
                  {{-- <div style="padding:10px; float:right">
                      {{ $getRecord->appends(request()->query())->links() }}
                      </div>                     --}}
                    
                  </div>
                </div>
                @endif
                <!-- /.card -->

            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

</x-admin>