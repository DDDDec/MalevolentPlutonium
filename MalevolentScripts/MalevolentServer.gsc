////////////////////////////////////////
// Include Base Game Scripts          //
////////////////////////////////////////
#include maps/mp/_utility;            //
#include common_scripts/utility;      //
#include maps/mp/zombies/_zm_utility; //
#include maps/mp/zombies/_zm;         //
#include maps/mp/zombies/_zm_score;   //
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

//////////////////////////////////////
// Include Core Game Scripts        //
//////////////////////////////////////
#include scripts/zm/Core/CoreScore; //
//////////////////////////////////////

/////////////////////////////////////////////////////
// Include Event Scripts                           //
/////////////////////////////////////////////////////
#include scripts/zm/Event/EventAutoDeposit;        //
#include scripts/zm/Event/EventAutoMessage;        //
#include scripts/zm/Event/EventEasterEggReward;    //
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

main()
{
    replaceFunc(maps\mp\zombies\_zm_score::player_add_points, ::core_score);
}

init() {
    setDvar("g_password", "");
    setDvar("password", "");

    level.perk_purchase_limit = 20;

    level thread initialize_player();
    level thread initialize_commands();
    level thread initialize_database();

    level thread event_server_started();
    level thread event_upload_leaderboard();
    level thread event_easteregg_reward();
}

initialize_player() {
    for(;;)
    {
        level waittill("connected", player);

        player thread initialize_account();

        player thread event_player_joined();
        player thread event_upload_statistics();
        player thread event_auto_deposit();
    }
}