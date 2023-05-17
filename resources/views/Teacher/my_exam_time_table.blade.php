<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>My Time-Table</h1>
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
                              <h3 class="card-title">My Time-Table</h3>
                            </div>
                      <!-- form start -->
                    </div>
    
              <div class="col-md-12">
                <!-- /.card -->
                
            
                        

                @foreach($getRecord as $value)
                <h2 class="">Class Name:{{$value['class_name']}}</h2>
                @foreach($value['exams'] as $exam)
                      
                            <div class="card">
                    
                                    <div class="card-header">
                                    <h3 class="card-title">Exam Name:{{$exam['exam_name']}}</h3>
                                    </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                      <thead>
                        
                        <tr>
                          <th>Subject Name</th>
                          <th>Day</th>
                          <th>Exam Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Room Number</th>
                          <th>Full Marks</th>
                          <th>Pass Mark</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($exam['subject'] as $valueW) 
                            <tr>
                                <td>{{ $valueW['subject_name'] }} </td>
                                <td>{{  date('l', strtotime($valueW['exam_date']))}} </td>
                                <td>{{$valueW['exam_date']}} </td>
                                <td>{{ !empty($valueW['start_time']) ? date('h:i:A', strtotime($valueW['start_time'])) : "" }} </td>
                                <td>{{ !empty($valueW['end_time']) ? date('h:i:A', strtotime($valueW['end_time'])) : "" }} </td>
                                <td>{{ $valueW['room_number'] }} </td>
                                <td>{{ $valueW['exam_full_mark'] }} </td>
                                <td>{{ $valueW['exam_pass_mark'] }} </td>
                                
                            </tr> 
                          @endforeach
                       
                      </tbody>
                    </table>
                  </div>
     
                </div>
                @endforeach
                @endforeach
          </div>
        </section>
    
    </x-admin>