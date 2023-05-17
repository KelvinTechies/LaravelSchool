<x-admin>

    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exam Mark Registers </h1>
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
                          <h3 class="card-title">Search Mark Registers</h3>
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
                              <a href='{{url("admin/marks_register")}}' class='btn btn-success' type='submit' style="margin-top:30px;">Clear</a>
                              
                            </div>
                    </div>
                  </div>
                    
                  </form>
                </div>
             


          <div class="col-md-12">
@include('_message')
@if(!empty($getSubject))
          {{-- <form action ="{{url('admin/Examination/exam_schedule/insert')}}" method='post'>
            @csrf
            <input type='hidden' name='exam_id' value="{{ Request::get('exam_id') }}">
            <input type='hidden' name='class_id' value="{{ Request::get('class_id') }}"> --}}
            <form action ="" class='submitForm' name='post'>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      
                      <th>Student Name</th>
                      {{-- <th>Subject Name</th>                       --}}
                        @foreach($getSubject as $subject)
                      
                      <th>{{ $subject->subject_name }}
                        ({{ $subject->subject_type }}):({{$subject->exam_pass_mark}}/{{$subject->exam_full_mark}})</th>
                    
                   

                      @endforeach
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @if(!empty($getStudentClass) && !empty($getStudentClass->count()))
                        @foreach($getStudentClass as $student)
                      <tr>
                        
                      <td>{{ $student->name }}  {{ $student->Last_Name }}</td>
                      @foreach($getStudentClass as $student)
                            <td>
                               <div style='margin-bottom:10px;'>
                                    Class-Work
                                    <input type='text' name='' width="200px" class='form-control'>

                               </div>
                               <div style='margin-bottom:10px;'>
                                    Test-Work
                                    <input type='text' name='' width="200px" class='form-control'>

                               </div>
                               <div style='margin-bottom:10px;'>
                                    Home-Work
                                    <input type='text' name='' width="200px" class='form-control'>

                               </div>
                               <div style='margin-bottom:10px;'>
                                    Exam-Work
                                    <input type='text' name='' width="200px" class='form-control'>

                               </div>
                            </td>  
                                                  
                      @endforeach
                      <td>
                            <button type='submit' class='btn btn-success'>Save</button>
                      </td>                          
                        </tr>
                        
                      @endforeach
                        
                      @endif
                  </tbody>
                </table>
            </form>
           
              </div>
            </div> 
            
            @endif

    </section>

</x-admin>
@section('script')

<script type="text/javascript">
$('.submitForm').submit(function(e){
    e.preventDefault()
    console.log('hi');
    
})
</script>

@endsection