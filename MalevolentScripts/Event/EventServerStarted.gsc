///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////////////
// Event Server Started Script               //
///////////////////////////////////////////////
// Event fires everytime the server restarts //
///////////////////////////////////////////////
event_server_started()
{
    database_query("INSERT INTO server_actions (`server_name`, `server_action`) VALUES (?, ?)", array(utility_get_map(), "The " + utility_get_map() + " server has started and is ready to play"));
}