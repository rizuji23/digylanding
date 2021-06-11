<?php 



    function alert($text, $url){
        echo "<script> alert('". $text ."'); document.location.href = '" .  $url . "' </script>";
    }


?>