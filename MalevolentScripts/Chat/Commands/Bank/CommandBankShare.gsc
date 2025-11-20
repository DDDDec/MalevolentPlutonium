///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////
// Command Bank Share Script         //
///////////////////////////////////////
// Shares money to all players       //
///////////////////////////////////////
command_bank_share(args)
{
    if (!isDefined(args[1])) {
        self tell("You need to input an amount to share");
        return;
    }

    if (int(args[1]) == 0) {
        return;
    }
}