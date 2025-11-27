///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////
// Command Fun Lock Server Script    //
///////////////////////////////////////
// Locks server behind a password    //
///////////////////////////////////////
command_fun_lock_server(args)
{
    if (int(level.round_number) < int(getDvar("command_lock_allowed_round"))) {
        self tell("[^5ServerLock^7] You cannot lock the server until round 15 or higher");
        return;
    }

    password = randomIntRange(1000, 9999);
    setDvar("g_password", password);
    setDvar("password", password);
}