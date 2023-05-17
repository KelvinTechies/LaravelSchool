<x-admin>
        <!-- Content Wrapper. Contains page content -->
        {{-- 
        <div class="content-wrapper">
        --}}
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <div class="">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                 <div class="container-fluid">
                    <div class="row mb-2">
                       <div class="col-sm-6">
                          <h1>My Calendar ({{$getStudent->name}} {{$getStudent->Last_Name}})</h1>
                       </div>
                    </div>
                 </div>
              </section>
    
              
              <section class="content">
                 <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                       <div id="calendar"></div>
                           
                       </div>
                    </div>
                 </div>
              </section>
           </div>
     </x-admin>
     <script src="{{asset('fullcalendar/dist/index.global.js')}}"></script>
    
     <script>
         var events = new  Array()
         @foreach($getMyTimeTable as $value)
            @foreach($value['week'] as $week)
                events.push({
                    title:"{{ $value['name'] }}",
                    daysOfWeek:[{{$week['full_calendar_day']}}],
                    startTime: "{{$week['start_time'] }}",
                    endTime: "{{$week['end_time'] }}",
                color:"red"
                   
                })
            @endforeach
         @endforeach
    
    
       @foreach($getExamTimeTable as $valueE)
            @foreach($valueE['exams'] as $exam)
                events.push({
                    title:"{{ $valueE['name']}} {{ $exam['subject_name'] }} {{ date('h:i:A', strtotime($exam['start_time'])) }} to {{ date('h:i:A', strtotime($exam['end_time'])) }}",
                   start:"{{ $exam['exam_date'] }}",
                //    end:"{{ $exam['end_time'] }}"
                color:"green",
                    // url:"{{ url('Students/my_exam_time_table') }}"
                })
            @endforeach
         @endforeach
    
    
         var calendarId  =document.getElementById('calendar')
         var calendar = new FullCalendar.Calendar(calendarId, {
             headerToolbar:{
                 left:'prev,next today',
                 center:'title',
                 right: 'dayGridMonth,timeGridWeek,timeGridDay'
             },
             initialDate:"<?=date('Y-m-d')?>",
             navLinks:true,
             editable:false,
             events:events,
         });
    
         calendar.render();
     </script>