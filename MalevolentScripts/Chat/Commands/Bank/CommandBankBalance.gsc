///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////
// Command Bank Balance Script       //
///////////////////////////////////////
// Displays the players bank balance //
///////////////////////////////////////
command_bank_balance(args)
{
    account = database_query("SELECT player_money FROM user_statistics WHERE id=?", array(self.guid));

    self tell("[^5Balance^7] ^5$" + utility_format_number(account[0][0]["player_money"]));
}