$(document).ready(function () {

$("#theForm").ajaxForm({type: 'post',  
         success: function(){  
           
			

			alert('Your question is successfully editted');
			
		   },});
});