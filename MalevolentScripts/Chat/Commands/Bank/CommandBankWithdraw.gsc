///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////
// Command Bank Withdraw Script      //
///////////////////////////////////////
// Withdraws money from the bank     //
///////////////////////////////////////
command_bank_withdraw(args)
{
    money = 1000000 - self.score;

    if (!isDefined(args[1]))
        self tell("You need to input an amount to withdraw");
        return;

    if (int(args[1]) == 0)
        return;

    if (self.score == 1000000)
        self tell("You already have the max amount of money");
        return;

    account = database_query("SELECT * FROM user_statistics WHERE id=?", array(self.guid));

    if (int(account[0][0]["player_money"]) == 0)
        self tell("You don't have any money in your bank account");
        return;

    if (args[1] == "all" || int(args[1]) > int(money))
        database_query("UPDATE user_statistics SET player_money=player_money-? WHERE id=?", array(money, self.guid));
        self tell("You have withdrawn ^5$" + utility_format_number(money) + "^7 from your bank account");
        self.score = 1000000;
        return;

    database_query("UPDATE user_statistics SET player_money=player_money-? WHERE id=?", array(args[1], self.guid));
    self tell("You have withdraw ^5$" + utility_format_number(args[1]) + "^7 from your bank account");
    self.score += int(args[1]);
    return;
}