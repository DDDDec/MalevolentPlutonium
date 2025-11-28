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
    account = database_query("SELECT * FROM user_statistics WHERE user_id = ?", array(self.guid));

    if (account[0].size == 0) {
        database_query("INSERT INTO user_statistics (`user_id`, `user_name`, `user_last_map`) VALUES (?, ?, ?)", array(self.guid, self.name, utility_get_map()));
        account = database_query("SELECT * FROM user_statistics WHERE user_id = ?", array(self.guid));
    }

    if (int(account[0][0]["user_banned"]) == 1) {
        utility_kick_player("                                                                                                                                                                                                                   [^5Clipstone^7] You are ^5BANNED^7                                                                                                                                                                      Appeal at ^5https://zombies.clipst.one^7");
        return;
    }

    self setClientDvar("r_lodBiasRigid", -1000);
    self setClientDvar("r_lodBiasSkinned", -1000);

    self.pers["player-data"] = account[0][0]["user_level"] + ";" + account[0][0]["user_rank"] + ";" + account[0][0]["user_prestige"] + ";" + self.name + ";" + account[0][0]["user_color"] + ";0";
    self rename("[^" + account[0][0]["user_color"]  + "L" + account[0][0]["user_level"] + "^7][^" + account[0][0]["user_color"]  + "P" + account[0][0]["user_prestige"] + "^7] " + self.name + "^7");
}