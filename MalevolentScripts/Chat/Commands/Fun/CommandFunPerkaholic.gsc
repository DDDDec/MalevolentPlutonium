///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////
// Command Fun Perkaholic Script     //
///////////////////////////////////////
// Gives perkaholic to the player    //
///////////////////////////////////////
command_fun_perkaholic(args)
{
    player_data = strToK(self.pers["player-data"], ";");

    if (int(player_data[0]) < 0) {
        self tell("[^5Perkaholic^7] You need to be level ^510+^7 to use this command.");
        return;
    }

    if (int(level.round_number) < 0) {
        self tell("[^5Perkaholic^7] You need to be on round ^515+^7 to use this command.");
        return;
    }

    if (isDefined(level.zombiemode_using_juggernaut_perk) && level.zombiemode_using_juggernaut_perk)
        self utility_give_perk("specialty_armorvest");
    if (isDefined(level.zombiemode_using_sleightofhand_perk) && level.zombiemode_using_sleightofhand_perk)
        self utility_give_perk("specialty_fastreload");
    if (isDefined(level.zombiemode_using_revive_perk) && level.zombiemode_using_revive_perk)
        self utility_give_perk("specialty_quickrevive");
    if (isDefined(level.zombiemode_using_doubletap_perk) && level.zombiemode_using_doubletap_perk)
        self utility_give_perk("specialty_rof");
    if (isDefined(level.zombiemode_using_marathon_perk) && level.zombiemode_using_marathon_perk)
        self utility_give_perk("specialty_longersprint");
    if(isDefined(level.zombiemode_using_additionalprimaryweapon_perk) && level.zombiemode_using_additionalprimaryweapon_perk)
        self utility_give_perk("specialty_additionalprimaryweapon");
    if (isDefined(level.zombiemode_using_deadshot_perk) && level.zombiemode_using_deadshot_perk)
        self utility_give_perk("specialty_deadshot");
    if (isDefined(level.zombiemode_using_tombstone_perk) && level.zombiemode_using_tombstone_perk)
        self utility_give_perk("specialty_scavenger");
    if (isDefined(level._custom_perks) && isDefined(level._custom_perks["specialty_flakjacket"]) && (level.script != "zm_buried"))
        self utility_give_perk("specialty_flakjacket");
    if (isDefined(level._custom_perks) && isDefined(level._custom_perks["specialty_nomotionsensor"]))
        self utility_give_perk("specialty_nomotionsensor");
    if (isDefined(level._custom_perks) && isDefined(level._custom_perks["specialty_grenadepulldeath"]))
        self utility_give_perk("specialty_grenadepulldeath");
    if (isDefined(level.zombiemode_using_chugabud_perk) && level.zombiemode_using_chugabud_perk)
        self utility_give_perk("specialty_finalstand");
}