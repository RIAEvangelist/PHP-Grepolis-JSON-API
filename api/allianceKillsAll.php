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
            'alliances'   => array()
        )
    );
    
    if(!isset($_GET['world'])){
        $response['message']='missing world get param';
        die(
            json_encode($response)
        );
    }
    
    ob_start(); 
        readgzfile('http://'.$_GET['world'].'.grepolis.com/data/alliance_kills_all.txt.gz');
    $data=explode("\n",ob_get_clean());
    
    foreach($data as $index=>$alliance){
        $alliance=explode(',',$alliance);
        if($alliance[0]=="")
            continue;
        $response['data']['alliances'][$alliance[1]]=array(
            'rank'      => $alliance[0],
            'ID'        => $alliance[1],
            'points'    => $alliance[2]
        );
    }
    
    $response['success']=true;
    
    die(
        json_encode($response)
    );