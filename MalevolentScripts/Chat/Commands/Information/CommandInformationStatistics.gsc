///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////////////
// Command Information Statistics Script     //
///////////////////////////////////////////////
// Shows top stats (one user per statistic)  //
///////////////////////////////////////////////
command_information_statistics(args)
{
    topKills = database_query("SELECT user_name, user_kills FROM user_statistics ORDER BY user_kills DESC LIMIT 1", array());
    topDowns = database_query("SELECT user_name, user_downs FROM user_statistics ORDER BY user_downs DESC LIMIT 1", array());
    topRevives = database_query("SELECT user_name, user_revives FROM user_statistics ORDER BY user_revives DESC LIMIT 1", array());
    topHeadshots = database_query("SELECT user_name, user_headshots FROM user_statistics ORDER BY user_headshots DESC LIMIT 1", array());
    topMoney = database_query("SELECT user_name, user_money FROM user_statistics ORDER BY user_money DESC LIMIT 1", array());

    stats = array(
        "--------[ ^5Statistics^7 ]--------",
        "Kills ^5" + utility_format_number(topKills[0][0]["user_kills"]) + "^7 by ^5" + topKills[0][0]["name"],
        "Downs ^5" + utility_format_number(topDowns[0][0]["user_downs"]) + "^7 by ^5" + topDowns[0][0]["name"],
        "Revives ^5" + utility_format_number(topRevives[0][0]["user_revives"]) + "^7 by ^5" + topRevives[0][0]["name"],
        "Headshots ^5" + utility_format_number(topHeadshots[0][0]["user_headshots"]) + "^7 by ^5" + topHeadshots[0][0]["name"],
        "Money ^5$" + utility_format_number(topMoney[0][0]["user_money"]) + "^7 by ^5" + topMoney[0][0]["name"],
        "--------[ ^5Statistics^7 ]--------"
    );

    foreach (message in stats)
        self tell(message);
}
