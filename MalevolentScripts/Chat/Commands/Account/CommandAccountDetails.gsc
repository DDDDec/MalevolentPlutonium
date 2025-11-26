///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/Utility;         //
#include scripts/zm/Utility/UtilityDatabase; //
///////////////////////////////////////////////

////////////////////////////////////////////
// Command Account Details Script         //
////////////////////////////////////////////
// Shows the player their account details //
////////////////////////////////////////////
command_account_details(args)
{
    account = database_query("SELECT * FROM user_statistics WHERE user_id=?", array(self.guid));

    details = array(
        "[^5Account^7] GUID: " + self.guid,
        "[^5Account^7] Rank: " + account[0][0]["user_rank"],
        "[^5Account^7] Level: " + account[0][0]["user_level"],
        "[^5Account^7] Prestige: " + account[0][0]["user_prestige"]
    );

    foreach(message in details)
        self tell(message);
}