$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     var host = window.location.href;
     host = host.split('/');
     var url = host[0] + "//" + host[2] + "/";
  $('#generate-key').on('click', function(e){
      $.ajax({
          url: url+"admin/api-token/generate-api-token", 
          type:'get',
          beforeSend: function() {
           $('.ajax-loader').show();    
          },
          
          success: function(result){
           setTimeout(() => {
                 $('.ajax-loader').hide();
            }, 2000);
         }
     });
  });
});