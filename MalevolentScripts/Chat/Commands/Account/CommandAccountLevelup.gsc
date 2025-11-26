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

    if (int(player_data[0]) == int(getDvar("account_max_level")) && int(player_data[2]) < int(getDvar("account_max_prestige"))) {
        self tell("[^5LevelUp^7] You're max level, to carry on you need to .prestige");
        return;
    }

    if (int(player_data[0]) == int(getDvar("account_max_prestige_level"))) {
        self tell("[^5LevelUp^7] You're max level you cannot progress any further");
        return;
    }

    account = database_query("SELECT * FROM user_statistics WHERE user_id=?", array(self.guid));
    next_level_money = int(account[0][0]["user_level"]) * int(getDvar("account_cost_level"));
    next_level = int(account[0][0]["user_level"]) + 1;

    if (int(account[0][0]["user_money"]) <= int(next_level_money)) {
        self tell("[^5LevelUp^7] You cannot afford to levelup you need ^5$" + utility_format_number(next_level_money));
        return;
    }

    if (isDefined(args[1]) && args[1] == "all") {
        while (int(account[0][0]["user_level"]) < int(getDvar("account_max_prestige_level"))) {
            if (int(account[0][0]["user_money"]) < int(next_level_money)) { break; }
            if (int(player_data[2]) < 20 && int(next_level) == int(getDvar("account_max_level"))) { break; }

            account[0][0]["user_level"] = int(account[0][0]["user_level"]) + 1;
            account[0][0]["user_money"] = int(account[0][0]["user_money"]) - int(next_level_money);
            next_level_money = int(account[0][0]["user_level"]) * int(getDvar("account_cost_level"));
            next_level = int(account[0][0]["user_level"]) + 1;
        }

        database_query("UPDATE user_statistics SET user_level=?+1, user_money=? WHERE user_id=?", array(account[0][0]["user_level"], account[0][0]["user_money"], self.guid));
        database_query("INSERT INTO user_actions (`user_name`, `user_action`) VALUES (?, ?)",  array(self.name, "has leveled up to level " + account[0][0]["user_level"]));
        self.pers["player-data"] = next_level + ";" + account[0][0]["user_rank"] + ";" + account[0][0]["user_prestige"] + ";" + self.name + ";" + account[0][0]["user_color"];
        self tell("[^5LevelUp^7] You have levelled up to level ^5" + utility_format_number(next_level) + "^7 for ^5$" + utility_format_number(next_level_money));
        return;
    }

    database_query("UPDATE user_statistics SET user_money=user_money-?, user_level=user_level+1 WHERE user_id=?", array(next_level_money, self.guid));
    database_query("INSERT INTO user_actions (`user_name`, `user_action`) VALUES (?, ?)",  array(self.name, "has leveled up to level " + next_level));

    self.pers["player-data"] = next_level + ";" + account[0][0]["user_rank"] + ";" + account[0][0]["user_prestige"] + ";" + self.name + ";" + account[0][0]["user_color"];
    self tell("[^5LevelUp^7] You have levelled up to ^5" + next_level + "^7 for ^5$" + utility_format_number(next_level_money));
}