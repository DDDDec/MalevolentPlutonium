////////////////////////////////////////
// Include Base Game Scripts          //
////////////////////////////////////////
#include maps/mp/_utility;            //
#include common_scripts/utility;      //
#include maps/mp/zombies/_zm_utility; //
#include maps/mp/zombies/_zm;         //
////////////////////////////////////////

///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

////////////////////////////////////////////
// Command Gamble Bet Script              //
////////////////////////////////////////////
// Gambles a given amount at a 50 percent //
// chance with the server                 //
////////////////////////////////////////////
command_gamble_bet(args)
{
    if (!isDefined(args[1])) {
        self tell("[^5Bet^7] You need to input a value to bet");
        return;
    }

    if (int(args[1]) < 1) {
        self tell("[^5Bet^7] You need to input a valid value to bet");
        return;
    }

    account = database_query("SELECT * FROM user_statistics WHERE id=?", array(self.guid));

    if (int(args[1]) > int(account[0][0]["user_money"])) {
        self tell("[^5Bet^7] You cannot bet more money than you have in your bank account");
        return;
    }

    if (!isDefined(args[2])) {
        if (cointoss()) {
            self tell("[^5Bet^7] You have won your bet against the server and won ^5$" + args[1]);

            database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(args[1], self.guid));
            database_query("INSERT INTO user_actions (`user_name`, `user_action`) VALUES (?, ?)", array(self.name, "Won £" + args[1] + " from gambling"));
            return;
        }

        self tell("[^5Bet^7] You have lost your bet against the server and lost ^5$" + args[1]);

        database_query("UPDATE user_statistics SET user_money=user_money-? WHERE user_id=?", array(args[1], self.guid));
        database_query("INSERT INTO user_actions (`user_name`, `user_action`) VALUES (?, ?)", array(self.name, "Lost £" + args[1] + " from gambling"));
    }
}