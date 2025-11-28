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
        self tell("[^5Pay^7] You need to input a player to send money too");
        return;
    }

    if (int(args[1]) == 0 || int(args[1]) < 1) {
        self tell("[^5Pay^7] You need to input a amount greater than 0");
        return;
    }

    account = database_query("SELECT * FROM user_statistics WHERE user_id=?", array(self.guid));

    if (int(args[1]) > int(account[0][0]["user_money"])) {
        self tell("[^5Pay^7] You cannot pay money you do not have");
        return;
    }

    database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_name LIKE ?", array(args[1], "%" + args[2] + "%"));
    database_query("UPDATE user_statistics SET user_money=user_money-? WHERE user_id=?", array(args[1], self.guid));
    database_query("INSERT INTO user_actions (`name`, `action`) VALUES (?, ?)",  array(self.name, "has just paid £" + utility_format_number(args[1]) + " into " + args[2] + "'s bank"));
    self tell("[^5Pay^7] You paid ^5$" + utility_format_number(args[1]) + "^7 to ^5" + args[2]);
}