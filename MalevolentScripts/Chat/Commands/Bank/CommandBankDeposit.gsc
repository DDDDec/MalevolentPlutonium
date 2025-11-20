///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////
// Command Bank Deposit Script       //
///////////////////////////////////////
// Deposits money into players bank  //
///////////////////////////////////////
command_bank_deposit(args)
{
    if (self.score == 0)
        self tell("You don't have any money to deposit into your bank account");
        return;

    if (int(args[1]) > self.score)
        self tell("You cannot deposit money you do not have");
        return;

    if (args[1] == "all")
        database_query("UPDATE user_statistics SET player_money=player_money+? WHERE id=?", array(self.score, self.guid));
        self tell("You have deposited ^5$" + utility_format_number(self.score) + "^7 into your bank account");
        self.score = 0;
        return;

    database_query("UPDATE user_statistics SET player_money=player_money+? WHERE id=?", array(args[1], self.guid));
    self tell("You have deposited ^5$" + utility_format_number(args[1]) + "^7 into your bank account");
    self.score -= int(args[1]);
}