
function checkAvailability() {
console.log('this')
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#staff_id").val(),
type: "POST",
success:function(data){
console.log(data);
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

