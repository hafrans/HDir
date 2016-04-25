/**
 * By Hafrans For HDir
 */
/**
 * Clock
 */
var h = document.getElementById("hour");
var m = h.nextElementSibling
var s = m.nextElementSibling;
~(function(){
	var date = new Date();
	h.innerHTML = Math.floor(date.getHours()/10)?date.getHours():"0"+date.getHours();
	m.innerHTML = Math.floor(date.getMinutes()/10)?date.getMinutes():"0"+date.getMinutes();
	s.innerHTML = Math.floor(date.getSeconds()/10)?date.getSeconds():"0"+date.getSeconds();
	setTimeout(arguments.callee,1000);
})();
