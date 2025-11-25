///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

////////////////////////////////////////////
// Command Information Leaderboard Script //
////////////////////////////////////////////
// Shows highest leaderboards to players  //
////////////////////////////////////////////
command_information_leaderboards(args)
{
    server = database_query("SELECT * FROM server_leaderboards WHERE leaderboard_map=? ORDER BY leaderboard_round DESC LIMIT 5", array(utility_get_map()));

    servers = array(
        "-------[ ^5Leaderboards^7 ]-------",
        "Round ^5" + utility_format_number(server[0][0]["leaderboard_round"]) + "^7 by ^5" + server[0][0]["leaderboard_players"],
        "Round ^5" + utility_format_number(server[0][1]["leaderboard_round"]) + "^7 by ^5" + server[0][1]["leaderboard_players"],
        "Round ^5" + utility_format_number(server[0][2]["leaderboard_round"]) + "^7 by ^5" + server[0][2]["leaderboard_players"],
        "Round ^5" + utility_format_number(server[0][3]["leaderboard_round"]) + "^7 by ^5" + server[0][3]["leaderboard_players"],
        "Round ^5" + utility_format_number(server[0][4]["leaderboard_round"]) + "^7 by ^5" + server[0][4]["leaderboard_players"],
        "-------[ ^5Leaderboards^7 ]-------"
    );

    foreach (server in servers)
        self tell(server);
}