Grepolis JSON API
=====================

This is a PHP based Grepolis JSON API. It gets the gZipped Grepolis CSV data from the specified world server and parses it into a useable JSON formate for client side consumption.

It also uses CORS to allow direct Javascript or JQuery request from remote domains.

Player API
====
/api/players.php?world= __{your world ID here (en1,us1,de1 etc...)}__


    {
        success:true,   
        message:'',
        data:[
            players:{//full list of all players in the world by their player ID
                "128748":{
                    "ID":"128748",
                    "name":"locoloco",
                    "allianceID":"",
                    "points":"221","rank":"16268",
                    "towns":"1"
                },
                "116766":{
                    "ID":"116766",
                    "name":"b+rad+29",
                    "allianceID":"53",
                    "points":"4512",
                    "rank":"501",
                    "towns":"1"
                },
                ... etc ..
           },
               "allied":[//IDs of players who currently have an alliance
               "116766",
               "119913",
               "122537"
               ...etc...
           ],
           "unallied":[//IDs of players who have no alliance
               "191561",
               "256845",
               "325455"
               ...etc...
           ]
    }

