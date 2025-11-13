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

    if (int(player_data[1]) == 10)
        self tell("You're at max prestige you cannot go any further");
        return;
}