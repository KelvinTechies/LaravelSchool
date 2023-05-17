<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>My Class & Subjects</h1>
              </div>
             
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            
              <div class="row">
                  <!-- left column -->
                    <!-- /.card -->
                 
                <!-- /.row -->


              <div class="col-md-12">
                <!-- /.card -->
    @include('_message')
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Class Name</th>
                          <th>Subject Name</th>
                          <th>Subject Type</th>
                          <th>My Time-Table</th>
                          <th>Date Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($getRecord as $value)
                       <tr>
                      
                           <td>{{ $value->class_name}}</td>
                           <td>{{ $value->subject_name}}</td>
                           <td>{{ $value->subject_type}}</td>
                           <td>
                              @php
                              $classSubject = $value->getMyTimeTable($value->class_id, $value->subject_id);
                             @endphp
                             @if(!empty($classSubject))
                             {{ $classSubject->start_time }} to {{ $classSubject->end_time }}
                             <br>
                              Room Number: {{ $classSubject->room_number }}
                             @endif
                           </td>
                           <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                           <td><a href='{{url('Teachers/my_class_subjects/class_timeTable/'.$value->class_id.'/'.$value->subject_id)}}'class='btn btn-primary'>My class Time-Table</a</td>
                          
                       </tr>
                       @endforeach
                      </tbody>
                    </table>
                    
                  {{-- <div style="padding:10px; float:right">
                      {{ $getRecord->appends(request()->query())->links() }}
                      </div>                     --}}
                    
                  </div>
                </div>
                <!-- /.card -->

            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

</x-admin>