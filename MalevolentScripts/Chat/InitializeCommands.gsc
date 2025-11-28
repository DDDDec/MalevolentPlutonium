///////////////////////////////////////////////////////////////////////////////
// Include Chat Command Scripts                                              //
///////////////////////////////////////////////////////////////////////////////
#include scripts/zm/Chat/Commands/CommandChat;                               //
#include scripts/zm/Chat/Commands/Account/CommandAccountDetails;             //
#include scripts/zm/Chat/Commands/Account/CommandAccountLevelup;             //
#include scripts/zm/Chat/Commands/Account/CommandAccountPrestige;            //
#include scripts/zm/Chat/Commands/Bank/CommandBankAutoDeposit;               //
#include scripts/zm/Chat/Commands/Bank/CommandBankBalance;                   //
#include scripts/zm/Chat/Commands/Bank/CommandBankDeposit;                   //
#include scripts/zm/Chat/Commands/Bank/CommandBankPay;                       //
#include scripts/zm/Chat/Commands/Bank/CommandBankShare;                     //
#include scripts/zm/Chat/Commands/Bank/CommandBankWithdraw;                  //
#include scripts/zm/Chat/Commands/Fun/CommandFunLockServer;                  //
#include scripts/zm/Chat/Commands/Fun/CommandFunPerkaholic;                  //
#include scripts/zm/Chat/Commands/Fun/CommandFunVault;                       //
#include scripts/zm/Chat/Commands/Gamble/CommandGambleBet;                   //
#include scripts/zm/Chat/Commands/Information/CommandInformationHelp;        //
#include scripts/zm/Chat/Commands/Information/CommandInformationLeaderboard; //
#include scripts/zm/Chat/Commands/Information/CommandInformationStatistics;  //
#include scripts/zm/Chat/Commands/Staff/CommandStaffGodmode;                 //
#include scripts/zm/Chat/Commands/Staff/CommandStaffPlayer;                  //
#include scripts/zm/Chat/Commands/Staff/CommandStaffPlayers;                 //
#include scripts/zm/Chat/Commands/Vision/CommandToggleFog;                   //
#include scripts/zm/Chat/Commands/Vision/CommandToggleVision;                //
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////
// Initialize Commands Function              //
///////////////////////////////////////////////
// Runs threads when the server first starts //
///////////////////////////////////////////////
initialize_commands()
{
    chat::register_command(".chat", ::command_chat(args), true);

    chat::register_command(array(".account", ".acc"), ::command_account_details(args), true);
    chat::register_command(array(".levelup", ".lu"), ::command_account_levelup(args), true);
    chat::register_command(array(".prestige", ".psg"), ::command_account_prestige(args), true);

    chat::register_command(array(".autodeposit", ".ad"), ::command_auto_deposit(args), true);
    chat::register_command(array(".balance", ".bal"), ::command_bank_balance(args), true);
    chat::register_command(array(".deposit", ".d"), ::command_bank_deposit(args), true);
    chat::register_command(array(".pay", ".p"), ::command_bank_pay(args), true);
    chat::register_command(array(".share", ".s"), ::command_bank_share(args), true);
    chat::register_command(array(".withdraw", ".w"), ::command_bank_withdraw(args), true);

    chat::register_command(array(".lock", ".l"), ::command_fun_lock_server(args), true);
    chat::register_command(array(".perkaholic", ".perks"), ::command_fun_perkaholic(args), true);
    chat::register_command(array(".vault", ".v"), ::command_fun_vault(args), true);

    chat::register_command(".bet", ::command_gamble_bet(args), true);

    chat::register_command(array(".help", ".h"), ::command_information_help(args), true);
    chat::register_command(array(".leaderboard", ".lb"), ::command_information_leaderboards(args), true);
    chat::register_command(array(".stats", ".st"), ::command_information_statistics(args), true);

    chat::register_command(array(".godmode", ".gm"), ::command_staff_godmode(args), true);
    chat::register_command(".player", ::command_staff_player(args), true);
    chat::register_command(".players", ::command_staff_players(args), true);

    chat::register_command(".fog", ::command_toggle_fog(args), true);
    chat::register_command(".vision", ::command_toggle_vision(args), true);
}