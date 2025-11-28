///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

////////////////////////////////////////
// Event Auto Message Script          //
////////////////////////////////////////
// Event fires a message every x mins //
////////////////////////////////////////
event_auto_message()
{
    level endon("end_game");

    while (true) {
        messages = array(
            "",
            ""
        );

        foreach(message in messages) {
            say(message);
        }

        wait 300;
    }
}