///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

////////////////////////////////////////
// Command Account Levelup Script     //
////////////////////////////////////////
// Levels player up to the next level //
////////////////////////////////////////
command_account_levelup(args)
{
    player_data = strToK(self.pers["player-data"], ";");

    if (int(player_data[0]) == 65) {
        self tell("[^5LevelUp^7] You're max level, to carry on you need to .prestige");
        return;
    }

    account = database_query("SELECT * FROM user_statistics WHERE id=?", array(self.guid));
    next_level_money = int(player_data[0]) * 50000;
    next_level = int(account[0][0]["player_level"]) + 1;

    if (int(account[0][0]["player_money"]) <= int(next_level_money)) {
        self tell("[^5LevelUp^7] You cannot afford to levelup you need ^5$" + utility_format_number(next_level));
        return;
    }

    if (isDefined(args[1]) && args[1] == "all") {
        self tell("[^5LevelUp^7] You have levelled up as many times as you can afford");
        return;
    }

    account = database_query("UPDATE user_statistics SET player_money=player_money-?, player_level=player_level+1 WHERE id=?", array(next_level_money, self.guid));
    self tell("[^5LevelUp^7] You have levelled up to ^5" + next_level + "^7 for ^5$" + utility_format_number(next_level_money));
}