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


Alliance API
====
/api/alliances.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "alliances": {
                "2": {
                    "ID": "2",
                    "name": "Black Legion",
                    "points": "1393",
                    "towns": "2",
                    "members": "2",
                    "rank": "300"
                },
                "5": {
                    "ID": "5",
                    "name": "The Norse Brethren",
                    "points": "491200",
                    "towns": "145",
                    "members": "105",
                    "rank": "6"
                },
              ...etc...
            }
        }
    }


Town API
====
/api/towns.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "towns": {
                "40045": {
                    "ID": "40045",
                    "playerID": "144766",
                    "name": "chenk's city",
                    "islandX": "243",
                    "islandY": "493",
                    "numberOnIsland": "5",
                    "points": "199",
                    "ocean": 24
                },
                "7612": {
                    "ID": "7612",
                    "playerID": "104920",
                    "name": "elko city wwaamp",
                    "islandX": "613",
                    "islandY": "549",
                    "numberOnIsland": "17",
                    "points": "880",
                    "ocean": 65
                },
              ...etc...
            }
        }
    }


Island API
====
/api/islands.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "islands": {
                "117669": {
                    "ID": "117669",
                    "x": "12",
                    "y": "0",
                    "islandType": "1",
                    "availableTowns": "20",
                    "ocean": 0
                },
                "117670": {
                    "ID": "117670",
                    "x": "6",
                    "y": "4",
                    "islandType": "4",
                    "availableTowns": "20",
                    "ocean": 0
                },
            ...etc...
            }
        }
    }


Player Kills All Types API
====
/api/playerKillsAll.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "players": {
                "160926": {
                    "rank": "21958",
                    "ID": "160926",
                    "points": "0"
                },
                "161075": {
                    "rank": "31421",
                    "ID": "161075",
                    "points": "0"
                },
            ...etc...
            }
        }
    }


Player Kills Attack API
====
/api/playerKillsAttack.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "players": {
                "160926": {
                    "rank": "21958",
                    "ID": "160926",
                    "points": "0"
                },
                "161075": {
                    "rank": "31421",
                    "ID": "161075",
                    "points": "0"
                },
            ...etc...
            }
        }
    }


Player Kills Defend API
====
/api/playerKillsDefend.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "players": {
                "160926": {
                    "rank": "21958",
                    "ID": "160926",
                    "points": "0"
                },
                "161075": {
                    "rank": "31421",
                    "ID": "161075",
                    "points": "0"
                },
            ...etc...
            }
        }
    }


Alliance Kills All Types API
====
/api/allianceKillsAll.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "alliances": {
                "2": {
                    "rank": "34",
                    "ID": "2",
                    "points": "2893"
                },
                "5": {
                    "rank": "6",
                    "ID": "5",
                    "points": "56178"
                },
              ...etc...
            }
        }
    }


Alliance Kills Attack API
====
/api/allianceKillsAttack.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "alliances": {
                "2": {
                    "rank": "34",
                    "ID": "2",
                    "points": "2893"
                },
                "5": {
                    "rank": "6",
                    "ID": "5",
                    "points": "56178"
                },
              ...etc...
            }
        }
    }



Alliance Kills Defend API
====
/api/allianceKillsDefend.php?world= __{your world ID here (en1,us1,de1 etc...)}__

    {
        "success": true,
        "message": "",
        "data": {
            "alliances": {
                "2": {
                    "rank": "34",
                    "ID": "2",
                    "points": "2893"
                },
                "5": {
                    "rank": "6",
                    "ID": "5",
                    "points": "56178"
                },
              ...etc...
            }
        }
    }

