<x-admin>

    
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Parent Student-Lists</h1>
              </div>
              <div class="col-sm-6" style="text-align:right;">
              <a href="{{url('admin/Parents/add')}}" class='btn btn-primary'>Add New Parent</a>
                </ol>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          <div class="container-fluid">
            
              <div class="row">

              <div class="col-md-12">
    @include('_message')
  
                <div class="card">
                        
                        <div class="card-body p-0" style="over-flow:auto;">
                          <table class="table table-striped">
                        <div class="card">
                                <div class="card-header">
                                  <h3 class="card-title">Parent Student-Lists</h3>
                                </div>
                             <thead>
                                <tr>
                          <th>Profile Picture</th>                           
                          <th>Name</th>
                          <th>Email</th>
                          <th>Admission Number</th>
                          <th>Roll Numbe</th>
                          <th>Class</th>
                          <th>Gender</th>
                          <th>Birth Date</th>
                          <th>Caste</th>
                          <th>Religion </th>
                          <th>Mobile Number</th>
                          <th>Admission Date</th>
                          <th>Blood Group</th>
                          <th>Height</th>
                          <th>Weight</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @forEach($getRecord as $value)
                                      <tr>
                                      <td><img width="60" src='{{ $value->profile_pic ? asset('Uploads/Profile/'.$value->profile_pic) : asset('Uploads\default-img2.jpg')  }}' style="height:50px; width:50px; border-radius:50px;"></td>
                                     <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->Admission_Number}}</td>
                        <td>{{$value->Ref_num}}</td>
                        <td>{{$value->class_name}}</td>
                        <td>{{$value->Gender}}</td>
                        <td>{{$value->Date_Of_Birth}}</td>
                        <td>{{$value->Caste}}</td>
                        <td>{{$value->Religion}}</td>
                        <td>{{$value->Phone}}</td>
                        <td>{{$value->Admission_date}}</td>
                        <td>{{$value->Blood_Grp}}</td>
                        <td>{{$value->Height}}</td>
                        <td>{{$value->Weight}}</td>                   
                                      <td>{{date('d-m-Y h:i A', strtotime($value->created_at))}}</td>
                                      <td style="min-width:300px;">
                                        <a href='{{url('/Parents/my_student/subject/'.$value->id)}}'class='btn btn-primary btn-small'>View Subjects</a>
                                        <a href='{{url('/Parents/my_student/my_calendar/'.$value->id)}}'class='btn btn-warning btn-small'>Calendar</a>
                                      </td> 
                      
                                      </tr>
                        
              
                                      @endforeach
                    </div>
                  </div>
  
          </div>
        {{-- </section> --}}

</x-admin>