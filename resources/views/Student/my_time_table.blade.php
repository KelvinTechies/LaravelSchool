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
                        
                  <div class="card-body p-0">
                    <table class="table table-striped">
                            <div class="card">
                    
                                    <div class="card-header">
                                    <h3 class="card-title">{{$value['name']}}</h3>
                                    </div>
                      <thead>
                        
                        <tr>
                          <th>Weeks</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Room Number</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($value['week'] as $valueW) 
                            <tr>
                                <td>{{ $valueW['week_name'] }} </td>
                                <td>{{ !empty($valueW['start_time']) ? date('h:i:A', strtotime($valueW['start_time'])) : "" }} </td>
                                <td>{{ !empty($valueW['end_time']) ? date('h:i:A', strtotime($valueW['end_time'])) : "" }} </td>
                                <td>{{ $valueW['room_number'] }} </td>
                            </tr> 
                          @endforeach
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{-- @endforeach --}}
                  
                </div>
          </div>
        </section>
    
    </x-admin>