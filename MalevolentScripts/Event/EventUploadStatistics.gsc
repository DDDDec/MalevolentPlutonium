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

    insert = database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(self.score, self.guid));

    self tell("[^5Leaderboards^7] Your statistics have been uploaded & saved");
}