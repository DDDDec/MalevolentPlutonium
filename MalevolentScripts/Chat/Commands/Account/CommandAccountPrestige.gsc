///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

//////////////////////////////////////////
// Command Account Prestige Script      //
//////////////////////////////////////////
// Prestiges player up to next prestige //
//////////////////////////////////////////
command_account_prestige(args)
{
    player_data = strToK(self.pers["player-data"], ";");

    if (int(player_data[0]) < int(getDvar("account_max_level"))) {
        self tell("[^5Prestige^7] You need to be level " + utility_format_number(int(getDvar("account_max_level"))) + " to prestige");
        return;
    }

    if (int(player_data[2]) == int(getDvar("account_max_prestige"))) {
        self tell("[^5Prestige^7] You are master prestige, you cannot prestige any further");
        return;
    }

    account = database_query("SELECT * FROM user_statistics WHERE user_id=?", array(self.guid));

    if (int(account[0][0]["user_money"]) < int(getDvar("account_cost_prestige"))) {
        self tell("[^5Prestige^7] You cannot afford ^5$" + utility_format_number(getDvar("account_cost_prestige")) + "^7 to prestige");
        return;
    }

    database_query("UPDATE user_statistics SET user_level=1, user_money=user_money-?, user_prestige=user_prestige+1 WHERE user_id=?", array(getDvar("account_max_prestige"), self.guid));
    database_query("INSERT INTO user_actions (`user_name`, `user_action`) VALUES (?, ?)",  array(self.name, "has prestiged up to prestige " + next_prestige));
    next_prestige = int(player_data[2]) + 1;
    self.pers["player-data"] = "1;" + account[0][0]["user_rank"] + ";" + next_prestige + ";" + self.name + ";" + account[0][0]["user_color"];
    self tell("[^5Prestige^7] You have prestiged up to ^5" + utility_format_number(next_prestige));
}