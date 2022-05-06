<?php
    include_once('read_counter.php');
    
    $req_url = strtolower( !empty($_REQUEST['url']) ? $_REQUEST['url'] : '' );
    
    if(!empty($req_url))
    {
        $count = !empty($json[$req_url]) ? $json[$req_url] : 0;
        if( $_REQUEST['method']=='like' )
        {
            $count --;
        }
        else if( $_REQUEST['method']=='unlike' )
        {
            $count ++;
        }
        else
        {
            echo( json_encode( ['result'=>'failed']));
            exit;
        }
        if($count<=0) $count = 0;
    }
    
    $json[$req_url] = $count;

    file_put_contents($file, json_encode($json));
    
    echo( json_encode( ['result'=>'ok', 'count'=>$count]));

    
    