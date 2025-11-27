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
    level waittill_any("end_game_reward_starts_maxis", "end_game_reward_starts_richtofen", "highrise_sidequest_achieved", "quest_completed_thrice", "tomb_sidequest_complete", "transit_sidequest_achieved");

    players = level.players;

    foreach(player in players) {
        db_query("UPDATE `user_statistics` SET user_money=user_money+? WHERE user_id=?", array(getDvar("event_easteregg_reward"), player.guid));
    }

    db_query("INSERT INTO `server_feeds` (`server_name`,`server_action`) VALUES (?,?)", array(get_current_map(), "The "+ get_current_map() +" easter egg has been completed"));
}