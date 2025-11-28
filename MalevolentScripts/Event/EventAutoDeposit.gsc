///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

////////////////////////////////////////
// Event Auto Deposit Script          //
////////////////////////////////////////
// Tries to auto deposit every x secs //
////////////////////////////////////////
event_auto_deposit()
{
    level endon("end_game");
    self endon("disconnect");

    while (true) {
        player_data = strToK(self.pers["player-data"], ";");

        if (int(player_data[5]) == 1) {
            if (int(self.score) == 1000000) {
                score = 1000000;
                self.score = 0;
                update = database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(score, self.guid));
            }
        }

        wait 0.1;
    }
}