<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>My Student Subjects    <span class='text-primary'>({{$getUser->name}} {{$getUser->Last_Name}})</span</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            
              <div class="row">

              <div class="col-md-12">
                <!-- /.card -->
    @include('_message')
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Subject Name</th>
                          <th>Subject Type</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($getRecord as $value)
                       <tr>
                           <td>{{ $value->subject_name}}</td>
                           <td>{{ $value->subject_type}}</td>
                           <td><a href='{{url('Parents/my_student/subject/class_timeTable/'.$value->class_id.'/'.$value->subject_id.'/'.$getUser->id)}}'class='btn btn-primary'>My class Time-Table</a</td>
                          
                       </tr>
                       @endforeach
                      </tbody>
                    </table>
                </div>
                <!-- /.card -->

            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

</x-admin>