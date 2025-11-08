////////////////////////////////////////
// Include Base Game Scripts          //
////////////////////////////////////////
#include maps/mp/_utility;            //
#include common_scripts/utility;      //
#include maps/mp/zombies/_zm_utility; //
////////////////////////////////////////

///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////////////
// Account Initialize Function               //
///////////////////////////////////////////////
// Sorts the players account data            //
///////////////////////////////////////////////
initialize_account() {
    account = database_query("SELECT * FROM user_statistics WHERE id = ?", array(self.guid));

    if (account[0].size == 0) {
        database_query("INSERT INTO `user_statistics` (`id`, `name`) VALUES (?, ?)", array(self.guid, self.name));
    }

    account = database_query("SELECT * FROM user_statistics WHERE id = ?", array(self.guid));

    if (int(account[0][0]["player_banned"]) == 1) {
        utility_kick_player("                                                                                                                                                                                                                   [^5Clipstone^7] You are ^5BANNED^7                                                                                                                                                                      Appeal at ^5https://zombies.clipst.one^7");
    }

    self.pers["player-data"] = account[0][0]["player_level"] + ";" + account[0][0]["player_rank"] + ";" + account[0][0]["player_prestige"] + ";" + self.name + ";" + account[0][0]["player_color"];
}