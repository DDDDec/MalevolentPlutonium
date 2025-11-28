///////////////////////////////////////////////
// Include Utility Scripts                   //
///////////////////////////////////////////////
#include scripts/zm/Utility/UtilityDatabase; //
#include scripts/zm/Utility/Utility;         //
///////////////////////////////////////////////

///////////////////////////////////////
// Command Fun Vault Script          //
///////////////////////////////////////
// Cracks a vault from a given code  //
///////////////////////////////////////
command_fun_vault(args)
{
    if (!isDefined(args[1])) {
        self tell("[^5Vault^7] You need to input a passcode to crack a vault");
        return;
    }

    select = database_query("SELECT * FROM server_vaults WHERE vault_code=?", array(args[1]));

    if (!isDefined(select[0][0]["passcode"])) {
        self tell("[^5Vault^7] You failed to crack open a vault with ^5" + args[1]);
        return;
    }

    update = database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(select[0][0]["vault_money"], self.guid));
    self tell("[^5Vault^7] you cracked open a vault with ^5" + args[1] + "^7 and won ^5$" + select[0][0]["vault_money"]);
}