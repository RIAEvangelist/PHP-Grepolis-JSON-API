/*
As you may be inviting many people this is a nice quick invite removal script

To cancel all alliance invitations :
go to your alliance -> invites tab and run this from the console
$('#ally_invitations .cancel').trigger('click');
*/

//To invite a number of players who have no alliance:
var inviteCount=50; //change this nuber to reflect the number of players you wish to invite
var startFrom=0;    //use this as your initial offset for where to start inviting players from
$.get(
    'http://1942design.com/grepolis/api/players.php?world=us4', 
    //change this to your API if you deploy your own
    function(data){
        var h=game_definition_object.csrfToken;
        var town_id=game_definition_object.townId;
        console.log(data.data.unallied.length+' unallied players in this world');
        for(var i=startFrom; i<startFrom+inviteCount; i++){
            $.post(
                'http://us4.grepolis.com/game/alliance?action=invite&town_id='+town_id+'&h='+h,
                {
                    json:JSON.stringify(
                        {
                            "player_name":data.data.players[data.data.unallied[0]].name,
                            "town_id":town_id,
                            "nlreq_id":0
                        }
                    )
                },
                function(data){
                    console.log(data)
                }
            );
        }
    }
);