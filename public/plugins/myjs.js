$('.getclass').change(function(){
    var class_id0 = $(this).val()
    $.ajax({
        url:"{{url('class_time_table/get_subject')}}",
        type:"POST",
        data:{
            "_token":"{{csrf_token()}}",
            class_id:class_id,
            dataType:"json",
            success:function(response){
                $('#get_offer_id_video').val(id)
                $('#get_negotiable_video_call').html(response.success)
                $('#NegotiablePopupModelVideo').modal('show')
            }
        }
    })
})