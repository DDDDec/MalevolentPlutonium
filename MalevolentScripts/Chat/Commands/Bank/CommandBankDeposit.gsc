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
    if (self.score == 0) {
        self tell("[^5Deposit^7] You don't have any money to deposit into your bank account");
        return;
    }

    if (int(args[1]) > self.score) {
        self tell("[^5Deposit^7] You cannot deposit money you do not have");
        return;
    }

    if (args[1] == "all") {
        database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(self.score, self.guid));
        database_query("INSERT INTO user_actions (`name`, `action`) VALUES (?, ?)",  array(self.name, "has just deposited £" + utility_format_number(self.score) + " into their bank"));
        self tell("[^5Deposit^7] You have deposited ^5$" + utility_format_number(self.score) + "^7 into your bank account");
        self.score = 0;
        return;
    }

    database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(args[1], self.guid));
    database_query("INSERT INTO user_actions (`name`, `action`) VALUES (?, ?)",  array(self.name, "has just deposited £" + utility_format_number(args[1]) + " into their bank"));
    self tell("[^5Deposit^7] You have deposited ^5$" + utility_format_number(args[1]) + "^7 into your bank account");
    self.score -= int(args[1]);
}