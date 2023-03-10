<?php

/*
Pre-format text
$array : Array -> Required => Array to be pre formatted 
*/

function pr($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/*
Pre-format text and then die
$array : Array -> Required => Array to be pre formatted 
*/
function prd($array){
     echo "<pre>";
     print_r($array);
     echo "</pre>";
     die;
}

/*
Get Since Time
$time : time -> Required => time to  calculate 
Must be in Y-m-d H:i:s format eg 2019-07-27 20:31:43
*/

function getSinceTime($time) {
    $time = time() - $time;
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) 
            continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'').' ago';
    }
}

/*
Get greater date from two dates
$date1 : date time -> Required 
$date2 : date time -> Required 
eg: 27-07-2019, 27/07/2019, 27-07-2019 16:00:00, 27/07/2019 16:00:00
*/
function getGreaterDate($date1,$date2){
    $firstDate = str_replace("/","-",$date1);
    $secondDate = str_replace("/","-",$date2);
    $firstDate=trim($firstDate);
    $secondDate=trim($secondDate);
    $firstDate=strtotime($firstDate);
    $secondDate=strtotime($secondDate);
    if($firstDate < $secondDate){
        return $date2;
    }
    else{
        return $date1;
    }

}

/****************database related functions****************/

/*
Get all records from a single table
$table : String -> Required => name of the table 
*/
function getAllRecords($table){
     $CI = & get_instance();
     return $CI->db->get($table)->result_array();
}

/*
Get records with where and not where conditions from a single table
$table : String -> Required => name of the table 
$selectFields : Array -> Optional => fields you want to select
$whereArray :   Array -> Required => where condition to be fulfilled
$notWhereArray : Array -> Optional => where not conditions to be fulfilled
*/
function getRecordsWhere($table,$selectFields= array(), $whereArray, $notWhereArray = array()){
    $CI = & get_instance();

    if(!empty($selectFields)){
        $selectString = implode(',', $selectFields);
        $CI->db->select($selectString);
    }
    foreach ($whereArray as $wKey => $wValue) {
        $CI->db->where($wKey,$wValue);
    }
    if(!empty($notWhereArray)){
        foreach ($notWhereArray as $nwKey => $nwValue) {
            $CI->db->where($nwKey.'!=',$nwValue);
        }   
    }
    return $CI->db->get($table)->result_array();
}

/* 
Get number of records with where and not where conditions from a single table
$table  : String -> Required => name of the table 
$whereArray : Array -> Required => where condition to be fulfilled
$notWhereArray : Array -> Optional => where not conditions to be fulfilled
*/
function getCount($table, $whereArray=array(), $notWhereArray = array()){
    $CI = & get_instance();
    if(!empty($whereArray)){
        foreach ($whereArray as $wKey => $wValue) {
            $CI->db->where($wKey,$wValue);
        }
    }
    if(!empty($notWhereArray)){
        foreach ($notWhereArray as $nwKey => $nwValue) {
            $CI->db->where($nwKey.'!=',$nwValue);
        }
    }
    $res = $CI->db->get($table)->result_array();
    if(!empty($res)){
        return count($res);
    }
    else{
        return '0';
    }
}

/*
Print the last query
*/

function lq(){
    $CI = & get_instance();
    echo $CI->db->last_query();
}


/*
Get last inserted id
*/
function insertId(){
    $CI = & get_instance();
    return $CI->db->insert_id();
}

/* 
Email helper
Response => returns true if send successfully otherwise false
*Params*
$data['from'] : from email address
$data['from_name'] : From name displayed in email
$data['to'] : to email address
$data['cc'] : to cc email address
$data['bcc'] : to bcc email address
$data['subject'] : subject of email
$data['message'] : content of email
*/
function sendEmail($data){
    $CI = & get_instance();
    $CI->load->library('email');
    $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.mailtrap.io',
        'smtp_port' => 2525,
        'smtp_user' => '7b03f0f79c2191',
        'smtp_pass' => 'd3c199df61e2d0',
        'crlf' => "\r\n",
        'newline' => "\r\n",
        'mailtype' => 'html'
    );
    $CI->email->initialize($config);
    $CI->email->from($data['from'], $data['from_name']);
    $CI->email->to($data['to']);
    $CI->email->cc($data['cc']);
    $CI->email->bcc($data['bcc']);
    $CI->email->subject($data['subject']);
    $CI->email->message($data['message']);
    $CI->email->send();
    return ($CI->email->send()) ? TRUE : FALSE ;
}

?>