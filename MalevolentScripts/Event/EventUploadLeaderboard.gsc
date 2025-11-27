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

////////////////////////////////////////////
// Event Upload Leaderboard Script        //
////////////////////////////////////////////
// Event fires everytime the servers game //
// ends and uploads the round data        //
////////////////////////////////////////////
event_upload_leaderboard()
{
    level waittill("end_game");

    players = level.players;

    if (players.size > 0) {
        insert = database_query("INSERT INTO server_leaderboards (`leaderboard_map`,`leaderboard_players`,`leaderboard_player_count`,`leaderboard_round`) VALUES (?,?,?,?)", array(utility_get_map(), utility_player_names_string(), players.size, level.round_number - 1));
        say("[^5Leaderboards^7] Your leaderboard record has been uploaded & saved");
    }
}