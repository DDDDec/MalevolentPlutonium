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

    players = getPlayers();

    iteration = 0;
    kills = 0;
    downs = 0;
    revives = 0;
    headshots = 0;

    foreach(player in players)
        if (int(iteration) == 0)
            list = player.name;
        else
            list = list + " " + player.name;

        kills += player.pers["kills"];
        downs += player.pers["downs"];
        revives += player.pers["revives"];
        headshots += player.pers["headshots"];

        iteration += 1;

    database_query("INSERT INTO server_leaderboards (`server_map`,`server_players`,`server_round`,`server_kills`) VALUES (?,?,?,?)", array(utility_get_map(), list, level.round, kills));
}