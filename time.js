function display_c(){
var refresh=100; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() 
{
	var strcount
	var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
	var d = new Date();
	var x = ("0" + d.getDate()).slice(-2) + " " + monthNames[d.getMonth()] + " - " + ("0" + d.getHours()).slice(-2) + 
	" : " + ("0" + d.getMinutes()).slice(-2)+ " : " + ("0" + d.getSeconds()).slice(-2);

	document.getElementById('time').innerHTML = x;
	tt=display_c();
}