<?php

require_once ('./global.php');
$cur_clinic_id = readConfig($config_file_name);
$next_clinic_id = $cur_clinic_id + 1;

writeConfig($config_file_name, $next_clinic_id);

$page_url = $base_url.$cur_clinic_id;

if(checkPage($page_url)){
    writeSuccess($success_file_name, $page_url);
    sendEmail($page_url);
}

echo $next_clinic_id;

?>