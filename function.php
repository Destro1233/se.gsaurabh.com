<?php
function movePage($num,$url){
    static $http = array (
        100 => "Verified User Continue",
        101 => "Invalid Password"
    );
    header($http[$num]);
    header("Location:$url");
}
function priorityFunc($num1){
    static $list = array('0','1','2','3');
    foreach ($list as $key => $val) {
        if (strcasecmp($val, $num1) == 0) {
            return FALSE;
        }
    }
    return TRUE;
}
?>