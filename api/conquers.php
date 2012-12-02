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
            'conquers'=> array()
        )
    );
    
    if(!isset($_GET['world'])){
        $response['message']='missing world get param';
        die(
            json_encode($response)
        );
    }
    
    ob_start(); 
        readgzfile('http://'.$_GET['world'].'.grepolis.com/data/conquers.txt.gz');
    $data=explode("\n",ob_get_clean());
    
    foreach($data as $index=>$conquer){
        $conquer=explode(',',$conquer);
        if($conquer[0]=="")
            continue;
        $response['data']['conquers'][]=array(
            'townID'        => $conquer[0],
            'time'          => $conquer[1],
            'newPlayerID'   => $conquer[2],
            'oldPlayerID'   => $conquer[3],
            'newAllyID'     => $conquer[4],
            'oldAllyID'     => $conquer[5]
        );
    }
    
    $response['success']=true;
    
    die(
        json_encode($response)
    );