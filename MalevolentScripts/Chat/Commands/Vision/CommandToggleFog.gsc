///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

////////////////////////////////////////
// Command Toggle Fog Script          //
////////////////////////////////////////
// Toggles the fog on and off         //
////////////////////////////////////////
command_toggle_fog()
{
    if (int(getDvar("r_fog")) == 0) {
        self setClientDvar("r_fog", "1");
        self setClientDvar("r_dof_enable", "1");
        self tell("[^5Fog^7] You have enabled fog");
        return;
    }

    self setClientDvar("r_fog", "0");
    self setClientDvar("r_dof_enable", "0");
    self tell("[^5Fog^7] You have disabled fog");
}