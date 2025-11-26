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

    if (!isDefined(args[1])) {
        self tell("[^5Withdraw^7] You need to input an amount to withdraw");
        return;
    }

    if (self.score == 1000000) {
        self tell("[^5Withdraw^7] You already have the max amount of money");
        return;
    }

    account = database_query("SELECT * FROM user_statistics WHERE user_id=?", array(self.guid));

    if (int(account[0][0]["user_money"]) == 0) {
        self tell("[^5Withdraw^7] You don't have any money in your bank account");
        return;
    }

    if (args[1] == "all") {
        if (int(account[0][0]["user_money"]) >= int(money)) {
            database_query("UPDATE user_statistics SET user_money=user_money-? WHERE user_id=?", array(money, self.guid));
            self tell("[^5Withdraw^7] You have withdrawn ^5$" + utility_format_number(money) + "^7 from your bank account");
            self.score = 1000000;
            return;
        }

        database_query("UPDATE user_statistics SET user_money=0 WHERE user_id=?", array(self.guid));
        self tell("[^5Withdraw^7] You have withdrawn ^5$" + utility_format_number(account[0][0]["user_money"]) + "^7 from your bank account");
        self.score += int(account[0][0]["user_money"]);
        return;
    }

    if (int(args[1]) < 1) {
        self tell("[^5Withdraw^7] You need to input an amount greater than 0");
        return;
    }

    if (int(args[1]) > int(account[0][0]["user_money"])) {
        self tell("[^5Withdraw^7] You don't have enough money in your bank to withdraw ^5$" + utility_format_number(args[1]));
        return;
    }

    database_query("UPDATE user_statistics SET user_money=user_money-? WHERE user_id=?", array(args[1], self.guid));
    database_query("INSERT INTO user_actions (`name`, `action`) VALUES (?, ?)",  array(self.name, "has just withdrawn £" + utility_format_number(args[1]) + " from their bank"));
    self tell("[^5Withdraw^7] You have withdraw ^5$" + utility_format_number(args[1]) + "^7 from your bank account");
    self.score += int(args[1]);
}