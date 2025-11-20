///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////
// Command Bank Pay Script           //
///////////////////////////////////////
// Pays a specific player some money //
///////////////////////////////////////
command_bank_pay(args)
{
    if (!isDefined(args[1])) {
        self tell("[^5Pay^7] You need to input an amount to pay");
        return;
    }

    if (!isDefined(args[2])) {
        self tell("[^5Pay^7] You cannot send money to no one");
        return;
    }

    if (int(args[1]) == 0) {
        return;
    }

    account = database_query("SELECT player_money FROM user_statistics WHERE id=?", array(self.guid));

    if (int(args[1]) > int(account[0][0]["player_money"])) {
        self tell("[^5Pay^7] You cannot pay money you do not have");
        return;
    }
}