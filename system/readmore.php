<?php 
    function readmore($num, $string){
        $string = strip_tags($string);
        if (strlen($string) > $num) {

            
            $stringCut = substr($string, 0, $num);
            $endPoint = strrpos($stringCut, ' ');

            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }
?>