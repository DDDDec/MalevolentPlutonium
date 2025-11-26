fun_command_vault(args)
{
    if (!isDefined(args[1])) {
        self tell("[^5Vault^7] You need to input a passcode to crack a vault");
        return;
    }

    vault = database_query("SELECT * FROM server_vaults WHERE passcode=?", array(args[1]));

    if (!isDefined(vault[0][0]["passcode"])) {
        self tell("[^5Vault^7] You failed to crack open a vault with ^5" + args[1]);
        return;
    }

    account = database_query("UPDATE user_statistics SET user_money=user_money+? WHERE user_id=?", array(vault[0][0]["vault_money"], self.guid));
    self tell("[^5Vault^7] you cracked open a vault with ^5" + args[1] + "^7 and won ^5$" + vault[0][0]["vault_money"]);
}