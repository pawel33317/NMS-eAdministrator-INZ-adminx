<?php
echo '
	<script>
		function getOneLog(){
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function(){
                        if (xmlhttp.readyState==4 && xmlhttp.status==200){
                            document.getElementById("panelLogsAjax").innerHTML=xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET","'.URL.'logs/logPanelAjax/",true);xmlhttp.send();
                    t = setTimeout("getOneLog()", 15000);
                }
                $( document ).ready(function() {
                    getOneLog();
                });
        </script>
	';

?>
