///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

//////////////////////////////////////////
// Event Player Joined Script           //
//////////////////////////////////////////
// Event fires everytime a player joins //
//////////////////////////////////////////
event_player_joined()
{
    database_query("INSERT INTO user_actions (`user_name`, `user_action`) VALUES (?, ?)", array(self.name, self.name + " just joined the " + utility_get_map() + " server"));
}