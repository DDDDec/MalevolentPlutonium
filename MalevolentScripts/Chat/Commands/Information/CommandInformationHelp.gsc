///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

////////////////////////////////////////
// Command Information Help Script    //
////////////////////////////////////////
// Shows commands to players          //
////////////////////////////////////////
command_information_help(args)
{
    switch (args[1]) {
        case 1:
            help = array(
                "--------[ ^5Help^7 ]--------",
                "--------[ ^5Help^7 ]--------"
            );
        break;
        case 2:
            help = array(
                "--------[ ^5Help^7 ]--------",
                "--------[ ^5Help^7 ]--------"
            );
        break;
        default:
            help = array(
                "--------[ ^5Help^7 ]--------",
                "--------[ ^5Help^7 ]--------"
            );
    }

    foreach(message in help)
        say(message);
}