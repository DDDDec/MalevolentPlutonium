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

    if (int(account[0][0]["player_money"]) < 500000) {
        self tell("[^5Prestige^7] You cannot afford ^5$" + utility_format_number(500000) + "^7 to prestige");
        return;
    }

    account = database_query("UPDATE user_statistics SET player_money=player_money-500000, player_prestige=player_prestige+1 WHERE id=?", array(self.guid));
    next_prestige = int(player_data[2]) + 1;
    self tell("[^5Prestige^7] You have prestiged up to ^5" + utility_format_number(next_prestige));
}