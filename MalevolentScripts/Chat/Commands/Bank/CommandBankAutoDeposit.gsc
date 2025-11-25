////////////////////////////////////////
// Event Auto Deposit Script          //
////////////////////////////////////////
// Tries to auto deposit every x secs //
////////////////////////////////////////
command_auto_deposit(args)
{
    player_data = strToK(self.pers["player-data"], ";");

    if (int(player_data[5]) == 0) {
        self.pers["player-data"] = player_data[0] + ";" + player_data[1] + ";" + player_data[2] + ";" + player_data[3] + ";" + player_data[4] + ";1";
        self tell("[^5AutoDeposit^7] You have enabled auto deposit");
        return;
    }

    self.pers["player-data"] = player_data[0] + ";" + player_data[1] + ";" + player_data[2] + ";" + player_data[3] + ";" + player_data[4] + ";0";
    self tell("[^5AutoDeposit^7] You have disabled auto deposit");
}