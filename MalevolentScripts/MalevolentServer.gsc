////////////////////////////////////////
// Include Base Game Scripts          //
////////////////////////////////////////
#include maps/mp/_utility;            //
#include common_scripts/utility;      //
#include maps/mp/zombies/_zm_utility; //
#include maps/mp/zombies/_zm;         //
////////////////////////////////////////

/////////////////////////////////////////////////
// Include Account Scripts                     //
/////////////////////////////////////////////////
#include scripts/zm/Account/InitializeAccount; //
/////////////////////////////////////////////////

///////////////////////////////////////////////
// Include Chat Command Scripts              //
///////////////////////////////////////////////
#include scripts/zm/Chat/InitializeCommands; //
///////////////////////////////////////////////

/////////////////////////////////////////////////////
// Include Event Scripts                           //
/////////////////////////////////////////////////////
#include scripts/zm/Event/EventAuthMessage;        //
#include scripts/zm/Event/EventPlayerJoined;       //
#include scripts/zm/Event/EventServerStarted;      //
#include scripts/zm/Event/EventUploadLeaderboard;  //
#include scripts/zm/Event/EventUploadStatistics;   //
/////////////////////////////////////////////////////

///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

init() {
    setDvar("g_password", "");
    setDvar("password", "");

    level.perk_purchase_limit = 20;

    level thread initialize_player();
    level thread initialize_commands();
    level thread initialize_database();

    level thread event_server_started();
    level thread event_upload_statistics();
}

initialize_player() {
    for(;;)
    {
        level waittill("connected", player);
        player thread initialize_account();
        player thread initialize_player_spawn(player);

        player thread event_player_joined();
    }
}

initialize_player_spawn(player) {
    self endon("disconnect");
    level waittill("initial_blackscreen_passed");
}