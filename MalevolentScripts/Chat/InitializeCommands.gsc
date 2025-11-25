////////////////////////////////////////////////////////////////////
// Include Chat Command Scripts                                   //
////////////////////////////////////////////////////////////////////
#include scripts/zm/Chat/Commands/CommandChat;                    //
#include scripts/zm/Chat/Commands/Account/CommandAccountDetails;  //
#include scripts/zm/Chat/Commands/Account/CommandAccountLevelup;  //
#include scripts/zm/Chat/Commands/Account/CommandAccountPrestige; //
#include scripts/zm/Chat/Commands/Bank/CommandBankAutoDeposit;    //
#include scripts/zm/Chat/Commands/Bank/CommandBankBalance;        //
#include scripts/zm/Chat/Commands/Bank/CommandBankDeposit;        //
#include scripts/zm/Chat/Commands/Bank/CommandBankPay;            //
#include scripts/zm/Chat/Commands/Bank/CommandBankShare;          //
#include scripts/zm/Chat/Commands/Bank/CommandBankWithdraw;       //
#include scripts/zm/Chat/Commands/Gamble/CommandGambleBet;        //
#include scripts/zm/Chat/Commands/Staff/CommandStaffGodmode;      //
#include scripts/zm/Chat/Commands/Staff/CommandStaffPlayer;       //
#include scripts/zm/Chat/Commands/Staff/CommandStaffPlayers;      //
////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////
// Initialize Commands Function              //
///////////////////////////////////////////////
// Runs threads when the server first starts //
///////////////////////////////////////////////
initialize_commands()
{
    chat::register_command(".chat", ::command_chat(args), true);

    chat::register_command(".account", ::command_account_details(args), true);
    chat::register_command(".levelup", ::command_account_levelup(args), true);
    chat::register_command(".prestige", ::command_account_prestige(args), true);

    chat::register_command(".autodeposit", ::command_auto_deposit(args), true);
    chat::register_command(".balance", ::command_bank_balance(args), true);
    chat::register_command(".deposit", ::command_bank_deposit(args), true);
    chat::register_command(".pay", ::command_bank_pay(args), true);
    chat::register_command(".share", ::command_bank_share(args), true);
    chat::register_command(".withdraw", ::command_bank_withdraw(args), true);

    chat::register_command(".bet", ::command_gamble_bet(args), true);

    chat::register_command(".godmode", ::command_staff_godmode(args), true);
    chat::register_command(".player", ::command_staff_player(args), true);
    chat::register_command(".players", ::command_staff_players(args), true);
}