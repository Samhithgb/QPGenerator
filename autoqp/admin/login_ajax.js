$(document).ready(function () {
    
console.log('javascript');     
    
$('form').submit(function() {
     $theForm = $(this);
     console.log('here!');
     // send xhr request
     $.ajax({
         type: $theForm.attr('method'),
         url: $theForm.attr('action'),
         data: $theForm.serialize(),
         
         success: function(html){  
             console.log(html);
			if(html=='success')    {
			 //$("#add_err").html("right username or password");
			 window.location="admin/admindash.php";
			}
			else    {
			alert('Login failed!');
			}
		   },
        
     });

     // prevent submitting again
     return false;
});
});
