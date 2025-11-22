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

    if (int(player_data[0]) < 65) {
        self tell("[^5Prestige^7] You need to be level 65 to prestige");
        return;
    }

    if (int(player_data[1]) == 10) {
        self tell("[^5Prestige^7] You're at max prestige you cannot go any further");
        return;
    }

    account = database_query("SELECT * FROM user_statistics WHERE id=?", array(self.guid));

    if (int(account[0][0]["user_money"]) < 500000) {
        self tell("[^5Prestige^7] You cannot afford ^5$" + utility_format_number(500000) + "^7 to prestige");
        return;
    }

    database_query("UPDATE user_statistics SET user_money=user_money-500000, user_prestige=user_prestige+1 WHERE id=?", array(self.guid));
    database_query("INSERT INTO user_actions (`name`, `action`) VALUES (?, ?)",  array(self.name, "has prestiged up to prestige " + next_prestige));
    next_prestige = int(player_data[2]) + 1;
    self tell("[^5Prestige^7] You have prestiged up to ^5" + utility_format_number(next_prestige));
}