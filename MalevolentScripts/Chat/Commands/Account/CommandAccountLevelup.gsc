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

    if (int(player_data[0]) == 65)
        self tell("You're max level, to carry on you need to .prestige");
        return;

    if (args[1] == "all")
        account = database_query("SELECT * FROM user_statistics WHERE id=?", array(self.guid));
        self tell("");
        return;
}