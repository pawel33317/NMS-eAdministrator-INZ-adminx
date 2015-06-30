<?php
echo '
	<script>
		function getServiceStatesAjax(){
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function(){
                        if (xmlhttp.readyState==4 && xmlhttp.status==200){
                            document.getElementById("serviceStates").innerHTML=xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET","'.URL.'services/getServiceStates",true);xmlhttp.send();
                    t = setTimeout("getServiceStatesAjax()", 5000);
                }
                $( document ).ready(function() {
                    
                    getServiceStatesAjax();
                });
        </script>
	';

?>
