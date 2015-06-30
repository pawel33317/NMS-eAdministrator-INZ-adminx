<?php echo '
	<script>
		function ipajax(){
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("ipgen").value=xmlhttp.responseText;}}
		xmlhttp.open("GET","'.URL.'devicesettings/getFreeIP",true);xmlhttp.send();}
	</script>
	
	';

?>