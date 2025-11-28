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
    insert = database_query("INSERT INTO user_actions (`user_name`, `user_action`) VALUES (?, ?)", array(self.name, self.name + " joined the " + utility_get_map() + " server"));
    select = database_query("SELECT * FROM server_leaderboards WHERE leaderboard_map=? ORDER BY leaderboard_round DESC LIMIT 1", array(utility_get_map()));
    update = database_query("UPDATE user_statistics SET user_map=? WHERE user_id=?", array(utility_get_map(), self.guid));

    if (isDefined(select[0][0]["leaderboard_map"])) {
        welcome = array(
            "---------[ ^5Malevolent Zombies^7 ]---------",
            "Welcome to ^5Malevolent^7, The best zombie servers",
            "Type ^5.help^7 for a list of commands u can use",
            "Fully register at our website ^5malevolent.website^7",
            "Highest round is ^5" + utility_format_number(select[0][0]["leaderboard_round"]) + "^7 by ^5" + select[0][0]["leaderboard_players"],
            "---------[ ^5Malevolent Zombies^7 ]---------"
        );
    } else {
        welcome = array(
            "---------[ ^5Malevolent Zombies^7 ]---------",
            "Welcome to ^5Malevolent^7, The best zombie servers",
            "Type ^5.help^7 for a list of commands u can use",
            "Fully register at our website ^5malevolent.website^7",
            "---------[ ^5Malevolent Zombies^7 ]---------"
        );
    }

    foreach (message in welcome)
        self tell(message);
}