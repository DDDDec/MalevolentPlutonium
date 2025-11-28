////////////////////////////////////////
// Include Base Game Scripts          //
////////////////////////////////////////
#include maps/mp/_utility;            //
#include common_scripts/utility;      //
#include maps/mp/zombies/_zm_utility; //
#include maps/mp/zombies/_zm;         //
////////////////////////////////////////

///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

/////////////////////////////////////////////
// Event Upload Statistics Script          //
/////////////////////////////////////////////
// Event fires everytime the servers game  //
// ends and uploads all players statistics //
/////////////////////////////////////////////
event_upload_statistics()
{
    level waittill("end_game");
    self endon("disconnect");

    insert = database_query("UPDATE user_statistics SET user_money=user_money+?, user_joins=user_joins+?, user_kills=user_kills+?, user_downs=user_downs+?, user_revives=user_revives+?, user_headshots=user_headshots+? WHERE user_id=?", array(self.score, 1, self.pers["kills"], self.pers["downs"], self.pers["revives"], self.pers["headshots"], self.guid));

    self.score = 0;
    self tell("[^5Leaderboards^7] Your statistics have been uploaded & saved");
}