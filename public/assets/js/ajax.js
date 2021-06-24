$('#auth-form').submit(function(e){
   e.preventDefault();

   $.ajax({
       url: '/login',
       method: 'POST',
       data: $('#auth-form').serialize(),
       error: function(){
           showPopup('error', 'Request error!');
       },
       success: function (data){
           if(data.status !== 'OK'){
               showPopup('error', data.message);

           }
           else{
               window.location.reload();
           }
       }
   });
});

$('#submit-feedback-form').submit(function(e){
   e.preventDefault();

   $.ajax({
       url: '/submit_feedback',
       method: 'POST',
       data: $('#submit-feedback-form').serialize(),
       error: function(){
           showPopup('error', 'Request error!');
       },
       success: function (data){
           if(data.status !== 'OK'){
               showPopup('error', data.message);

           }
           else{
               showPopup('success', 'Your message was sended!');
               let form = $('#submit-feedback-form');
               form[0].reset();
           }

       }
   });
});
