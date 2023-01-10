$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  

    $("#old_password").keyup(function(){
      let oldPassVal = $(this).val();
      $.ajax({
        url:'/admin/adminUserUpdate',
        type:'post',
        data:{oldPassVal:oldPassVal},
        success:function(resp){
          if(resp === "hoice"){
            $("#checkCurrentPassword").html("<font color=green>Your password is correct man!!!!</font>");
            $(".passLink").append('<button class="btn btn-dark"><a href="/admin/adminPassUpdate">Update email,Password page</a></button>');
          }else{
            $("#checkCurrentPassword").html("<font color=red>Your password is incorrect</font>")
            $(".passLink").html('<p></p>');
           
          }
        },error:function(){
          alert('error khaico baca');
        }
      })
    })
       
});
