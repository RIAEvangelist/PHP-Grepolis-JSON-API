<?
    header('Access-Control-Allow-Origin: *');
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 1800));
    //header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    
    $response=array(
        'success'   => false,
        'message'   => '',
        'data'      => array(
            'islands'   => array()
        )
    );
    
    if(!isset($_GET['world'])){
        $response['message']='missing world get param';
        die(
            json_encode($response)
        );
    }
    
    ob_start(); 
        readgzfile('http://'.$_GET['world'].'.grepolis.com/data/islands.txt.gz');
    $data=explode("\n",ob_get_clean());
    
    foreach($data as $index=>$island){
        $island=explode(',',$island);
        if($island[0]=="")
            continue;
        $ocean=floor($island[1]/100)*10+floor($island[2]/100);
        $response['data']['islands'][$island[0]]=array(
            'ID'            => $island[0],
            'x'             => $island[1],
            'y'             => $island[2],
            'islandType'    => $island[3],
            'availableTowns'=> $island[4],
            'ocean'         => $ocean
        );
    }
    
    $response['success']=true;
    
    die(
        json_encode($response)
    );