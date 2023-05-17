<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Subjects Lists</h1>
              </div>
              <div class="col-sm-6" style="text-align:right;">
              <a href="{{url('admin/subject/add')}}" class='btn btn-primary'>Add New Subject</a>
                </ol>
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
                          
                       </tr>
                       @endforeach
                      </tbody>
                    </table>
                    
                  {{-- <div style="padding:10px; float:right">
                      {{ $getRecord->appends(request()->query())->links() }}
                      </div>                    
                    
                  </div> --}}
                </div>
                <!-- /.card -->

            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

</x-admin>