<?php
echo '
	<script>
		function getOneLog(){
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function(){
                        if (xmlhttp.readyState==4 && xmlhttp.status==200){
                            document.getElementById("log'.$this->currentLog.'").innerHTML=xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET","'.URL.'logs/logAjax/'.$this->currentLog.'",true);xmlhttp.send();
                    t = setTimeout("getOneLog()", 15000);
                }
                $( document ).ready(function() {
                    getOneLog();
                });
        </script>
	';

?>
