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
            'players'   => array(),
            'allied'    => array(),
            'unallied'  => array()
        )
    );
    
    if(!isset($_GET['world'])){
        $response['message']='missing world get param';
        die(
            json_encode($response)
        );
    }
    
    ob_start(); 
        readgzfile('http://'.$_GET['world'].'.grepolis.com/data/players.txt.gz');
    $data=explode("\n",ob_get_clean());
    
    foreach($data as $index=>$player){
        $player=explode(',',$player);
        if($player[0]=="")
            continue;
        $response['data']['players'][$player[0]]=array(
            'ID'        => $player[0],
            'name'      => urldecode($player[1]),
            'allianceID'=> $player[2],
            'points'    => $player[3],
            'rank'      => $player[4],
            'towns'     => $player[5]
        );
        
        $allied='allied';
        
        if($player[2]=='')
            $allied='unallied';
        
        $response['data'][$allied][]=$player[0];
    }
    
    $response['success']=true;
    
    die(
        json_encode($response)
    );