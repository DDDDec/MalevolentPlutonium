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

////////////////////////////////////////
// Event Easteregg Reward Script      //
////////////////////////////////////////
// Event gives rewards for eastereggs //
////////////////////////////////////////
event_easteregg_reward()
{
    level endon("end_game");
    level waittill_any_array(array("end_game_reward_starts_maxis", "end_game_reward_starts_richtofen", "highrise_sidequest_achieved", "quest_completed_thrice", "tomb_sidequest_complete", "transit_sidequest_achieved"));

    players = level.players;

    if (players.size > 0) {
        foreach(player in players) {
            database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(getDvar("event_easteregg_reward"), player.guid));
        }

        database_query("INSERT INTO server_feeds (`server_name`,`server_action`) VALUES (?,?)", array(utility_get_map(), "The "+ utility_get_map() +" easter egg has been completed"));
    }
}