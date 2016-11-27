
function checkAvailability() {
console.log('this')
jQuery.ajax({
url: "check_availability_admin.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
console.log(data);
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

