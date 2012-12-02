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
            'towns'   => array()
        )
    );
    
    if(!isset($_GET['world'])){
        $response['message']='missing world get param';
        die(
            json_encode($response)
        );
    }
    
    ob_start(); 
        readgzfile('http://'.$_GET['world'].'.grepolis.com/data/towns.txt.gz');
    $data=explode("\n",ob_get_clean());
    
    foreach($data as $index=>$town){
        $town=explode(',',$town);
        if($town[0]=="")
            continue;
        $ocean=floor($town[3]/100)*10+floor($town[4]/100);
        $response['data']['towns'][$town[0]]=array(
            'ID'            => $town[0],
            'playerID'      => $town[1],
            'name'          => urldecode($town[2]),
            'islandX'       => $town[3],
            'islandY'       => $town[4],
            'numberOnIsland'=> $town[5],
            'points'        => $town[6],
            'ocean'         => $ocean
        );
    }
    
    $response['success']=true;
    
    die(
        json_encode($response)
    );