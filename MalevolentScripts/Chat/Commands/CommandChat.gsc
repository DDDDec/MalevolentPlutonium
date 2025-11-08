///////////////////////////////////////
// Include Utility Scripts           //
///////////////////////////////////////
#include scripts/zm/Utility/Utility; //
///////////////////////////////////////
command_chat(args)
{
    player_data = strToK(self.pers["player-data"], ";");

    string = "";
    iteration = 0;
    foreach (message in args)
    {
        if (iteration > 0)
            if (string == "")
                string = " " + message;
            else
                string = string + " " + message;

        iteration += 1;
    }

    say("[^" + player_data[4] + "" + utility_format_rank(int(player_data[1])) + "^7][^" + player_data[4] + "L" + player_data[0] + "^7][^" + player_data[4] + "P" + player_data[2] + "^7] ^" + player_data[4] + "" + player_data[3] + " ^7>" + string);
}