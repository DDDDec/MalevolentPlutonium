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

///////////////////////////////////////
// Command Bank Share Script         //
///////////////////////////////////////
// Shares money to all players       //
///////////////////////////////////////
command_bank_share(args)
{
    if (!isDefined(args[1])) {
        self tell("[^5Share^7] You need to input an amount to share");
        return;
    }

    if (int(args[1]) == 0) {
        self tell("[^5Share^7] You need to input an amount greater than 0");
        return;
    }

    players = getPlayers();

    if (players.size <= 1) {
        self tell("[^5Share^7] There are not enough people to share money with");
        return;
    }

    account = database_query("SELECT * FROM user_statistics WHERE id=?", array(self.guid));
    share = 0;

    foreach (player in players) {
        if (int(self.guid) != int(player.guid)) {
            database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(args[1], player.guid));
            player tell("[^5Share^7] ^5" + self.name + "^7 has sent ^5$" + utility_format_number(args[1]) + "^7 to your bank account");
            share = int(share) + int(args[1]);
        }
    }

    database_query("UPDATE user_statistics SET user_money=user_money-? WHERE user_id=?", array(share, self.guid));
    database_query("INSERT INTO user_actions (`name`, `action`) VALUES (?, ?)",  array(self.name, "has just paid £" + utility_format_number(args[1]) + " into the whole lobbies bank"));
    self tell("[^5Share^7] You have sent ^5$" + utility_format_number(args[1]) + "^7 to all players in the lobby");
}