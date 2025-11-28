////////////////////////////////////////
// Include Base Game Scripts          //
////////////////////////////////////////
#include maps/mp/_utility;            //
#include common_scripts/utility;      //
#include maps/mp/zombies/_zm_utility; //
#include maps/mp/zombies/_zm_perks;   //
////////////////////////////////////////

///////////////////////////////////////////////////
// Utility Get Map Function                      //
///////////////////////////////////////////////////
// Returns the current map the server is running //
///////////////////////////////////////////////////
utility_get_map()
{
    location = getDvar( "ui_zm_mapstartlocation" );
    gamemode = getDvar( "ui_gametype" );

    if( location == "processing" )
        return "Buried";
    else if( location == "rooftop" )
        return "DieRise";
    else if( location == "prison" )
        return "Prison";
    else if( location == "nuked" )
        return "Nuketown";
    else if( location == "tomb" )
        return "Origins";
    else if( location == "town" )
        return "Town";
    else if( location == "farm" )
        return "Farm";
    else if( location == "transit" )
        if ( gamemode == "zclassic")
    	    return "Tranzit";
        if ( gamemode == "zstandard")
    	    return "Depot";
    return "NA";
}

///////////////////////////////////////////////
// Utility Kick Player Function              //
///////////////////////////////////////////////
// Kicks the given player from the server    //
///////////////////////////////////////////////
utility_kick_player(reason)
{
    executeCommand("clientkick_for_reason  " + self GetEntityNumber() + " \"" + reason + "\"");
}

///////////////////////////////////
// Utility Is Integer Function   //
///////////////////////////////////
// Checks if value is an integer //
///////////////////////////////////
utility_is_integer(value)
{
    new_int = int(value);

    if (value != "0" && new_int == 0)
        return 0;

    if(new_int > 0)
        return 1;
    else
        return 0;
}

////////////////////////////////////////////
// Utility Format Number Function         //
////////////////////////////////////////////
// Returns numbers formatted by thousands //
////////////////////////////////////////////
utility_format_number(num)
{
    strNum = num + "";

    len = 0;
    while (strNum[len] != undefined)
    {
        len++;
    }

    if (len <= 3)
        return strNum;

    formatted = "";
    firstGroupLen = len % 3;
    if (firstGroupLen == 0)
        firstGroupLen = 3;

    for (i = 0; i < firstGroupLen; i++)
    {
        formatted += strNum[i];
    }

    for (i = firstGroupLen; i < len; i += 3)
    {
        formatted += ",";
        for (j = 0; j < 3; j++)
        {
            formatted += strNum[i + j];
        }
    }

    return formatted;
}

////////////////////////////////////////////
// Utility Format Rank Function           //
////////////////////////////////////////////
// Returns the players rank               //
////////////////////////////////////////////
utility_format_rank(rank)
{
    switch (rank)
    {
        case 0:
            return "USER";
            break;

        case 1:
            return "VIP";
            break;

        case 2:
            return "VIP+";
            break;

        case 3:
            return "VIP++";
            break;

        case 4:
            return "VIP+++";
            break;

        case 5:
            return "TMOD";
            break;

        case 6:
            return "MOD";
            break;

        case 7:
            return "ADMIN";
            break;

        case 8:
            return "OWNER";
            break;
    }
}

/////////////////////////////////////////////////
// Utility Player Names String Function        //
/////////////////////////////////////////////////
// Loops through players and puts names into   //
// a single string                             //
/////////////////////////////////////////////////
utility_player_names_string()
{
    names = "";
    players = level.players;

    for ( i = 0; i < players.size; i++ )
    {
        player_data = strToK(players[i].pers["player-data"], ";");

        if (names == "")
    	{
    	    names = player_data[3];
    	}
    	else
    	{
    		names = names + ", " + player_data[3];
    	}
    }

    return names;
}

/////////////////////////////////////////////////
// Utility Perkaholic Function                 //
/////////////////////////////////////////////////
// Gives player a perk and does the animation  //
// for them                                    //
/////////////////////////////////////////////////
utility_give_perk(perk)
{
    self endon("disconnect");
    self endon("death");
    level endon("game_ended");
    self endon("perk_abort_drinking");
    if (!(self hasperk(perk) || (self maps\mp\zombies\_zm_perks::has_perk_paused(perk))))
    {
        gun = self maps\mp\zombies\_zm_perks::perk_give_bottle_begin(perk);
        evt = self waittill_any_return("fake_death", "death", "player_downed", "weapon_change_complete");
        if (evt == "weapon_change_complete")
            self thread maps\mp\zombies\_zm_perks::wait_give_perk(perk, 1);
        self maps\mp\zombies\_zm_perks::perk_give_bottle_end(gun, perk);
        if (self maps\mp\zombies\_zm_laststand::player_is_in_laststand() || isDefined(self.intermission) && self.intermission)
            return;
        self notify("burp");
    }
}

/////////////////////////////////////////
// Utility Format Time Function        //
/////////////////////////////////////////
// Returns formatted time from seconds //
/////////////////////////////////////////
utility_format_time(time)
{
    totalSeconds = int(time);

    hours = int(totalSeconds / 3600);
    minutes = int((totalSeconds % 3600) / 60);
    secs = totalSeconds % 60;

    if (hours < 10)
        hourStr = "0" + hours;
    else
        hourStr = hours + "";

    if (minutes < 10)
        minuteStr = "0" + minutes;
    else
        minuteStr = minutes + "";

    if (secs < 10)
        secondStr = "0" + secs;
    else
        secondStr = secs + "";

    return hourStr + ":" + minuteStr + ":" + secondStr;
}

////////////////////////////////////////////
// Utility Format Card Function           //
////////////////////////////////////////////
// Returns a card from an integer         //
////////////////////////////////////////////
utility_format_card(card)
{
    switch (int(card))
    {
        case 1:
            return "Ace Of Clubs";
            break;

        case 2:
            return "2 Of Clubs";
            break;

        case 3:
            return "3 Of Clubs";
            break;

        case 4:
            return "4 Of Clubs";
            break;

        case 5:
            return "5 Of Clubs";
            break;

        case 6:
            return "6 Of Clubs";
            break;

        case 7:
            return "7 Of Clubs";
            break;

        case 8:
            return "8 Of Clubs";
            break;

        case 9:
            return "9 Of Clubs";
            break;

        case 10:
            return "10 Of Clubs";
            break;

        case 11:
            return "Jack Of Clubs";
            break;

        case 12:
            return "Queen Of Clubs";
            break;

        case 13:
            return "King Of Clubs";
            break;

        case 14:
            return "Ace Of Diamonds";
            break;

        case 15:
            return "2 Of Diamonds";
            break;

        case 16:
            return "3 Of Diamonds";
            break;

        case 17:
            return "4 Of Diamonds";
            break;

        case 18:
            return "5 Of Diamonds";
            break;

        case 19:
            return "6 Of Diamonds";
            break;

        case 20:
            return "7 Of Diamonds";
            break;

        case 21:
            return "8 Of Diamonds";
            break;

        case 22:
            return "9 Of Diamonds";
            break;

        case 23:
            return "10 Of Diamonds";
            break;

        case 24:
            return "Jack Of Diamonds";
            break;

        case 25:
            return "Queen Of Diamonds";
            break;

        case 26:
            return "King Of Diamonds";
            break;

        case 27:
            return "Ace Of Hearts";
            break;

        case 28:
            return "2 Of Hearts";
            break;

        case 29:
            return "3 Of Hearts";
            break;

        case 30:
            return "4 Of Hearts";
            break;

        case 31:
            return "5 Of Hearts";
            break;

        case 32:
            return "6 Of Hearts";
            break;

        case 33:
            return "7 Of Hearts";
            break;

        case 34:
            return "8 Of Hearts";
            break;

        case 35:
            return "9 Of Hearts";
            break;

        case 36:
            return "10 Of Hearts";
            break;

        case 37:
            return "Jack Of Hearts";
            break;

        case 38:
            return "Queen Of Hearts";
            break;

        case 39:
            return "King Of Hearts";
            break;

        case 40:
            return "Ace Of Spades";
            break;

        case 41:
            return "2 Of Spades";
            break;

        case 42:
            return "3 Of Spades";
            break;

        case 43:
            return "4 Of Spades";
            break;

        case 44:
            return "5 Of Spades";
            break;

        case 45:
            return "6 Of Spades";
            break;

        case 46:
            return "7 Of Spades";
            break;

        case 47:
            return "8 Of Spades";
            break;

        case 48:
            return "9 Of Spades";
            break;

        case 49:
            return "10 Of Spades";
            break;

        case 50:
            return "Jack Of Spades";
            break;

        case 51:
            return "Queen Of Spades";
            break;

        case 52:
            return "King Of Spades";
            break;
    }
}

////////////////////////////////////////////
// Utility Print Origin Function          //
////////////////////////////////////////////
// Returns the origin of the player       //
////////////////////////////////////////////
utility_print_origin()
{
	for(;;)
	{
		if(self MeleeButtonPressed())
		{
			iPrintLn(self.origin + (0,0,55) + utility_vector_scale(AnglesToForward( self getplayerangles()), 10));
			wait 1;
		}
		wait 0.05;
	}
}

utility_vector_scale( vec, scale )
{
	vec = ( vec[ 0] * scale, vec[ 1] * scale, vec[ 2] * scale );
	return vec;
}

////////////////////////////////////////////
// Utility Weapon Stock Size Function     //
////////////////////////////////////////////
// Returns a given weapons stock size     //
////////////////////////////////////////////
utility_weapon_stock_size(weapon)
{
    // Snipers

    if (weapon == "dsr50_zm")
        return 48;

    if (weapon == "dsr50_upgraded_zm")
        return 96;

    if (weapon == "barretm82_zm")
        return 30;

    if (weapon == "barretm82_upgraded_zm")
        return 42;

    if (weapon == "svu_zm")
        return 96;

    if (weapon == "svu_upgraded_zm")
        return 192;

    // SMG

    if (weapon == "thompson_zm")
        return 350;

    if (weapon == "thompson_upgraded_zm")
        return 400;

    if (weapon == "qcw05_zm")
        return 120;

    if (weapon == "qcw05_upgraded_zm")
        return 200;

    if (weapon == "ak74u_zm")
        return 160;

    if (weapon == "ak74u_upgraded_zm")
        return 280;

    if (weapon == "ak74u_extclip_zm")
        return 180;

    if (weapon == "ak74u_extclip_upgraded_zm")
        return 300;

    if (weapon == "mp5k_zm")
        return 120;

    if (weapon == "mp5k_upgraded_zm")
        return 200;

    if (weapon == "pdw57_zm")
        return 200;

    if (weapon == "pdw57_upgraded_zm")
        return 350;

    if (weapon == "uzi_zm")
        return 275;

    if (weapon == "uzi_upgraded_zm")
        return 300;

    if (weapon == "mp40_zm")
        return 192;

    if (weapon == "mp40_upgraded_zm")
        return 256;

    if (weapon == "mp40_stalker_zm")
        return 88;

    if (weapon == "mp40_stalker_upgraded_zm")
        return 62;

    if (weapon == "evoskorpion_zm")
        return 256;

    if (weapon == "evoskorpion_upgraded_zm")
        return 320;

    // AR

    if (weapon == "fnfal_zm")
        return 180;

    if (weapon == "fnfal_upgraded_zm")
        return 360;

    if (weapon == "m14_zm")
        return 96;

    if (weapon == "m14_upgraded_zm")
        return 192;

    if (weapon == "mp44_zm")
        return 210;

    if (weapon == "mp44_upgraded_zm")
        return 330;

    if (weapon == "saritch_zm")
        return 140;

    if (weapon == "saritch_upgraded_zm")
        return 420;

    if (weapon == "m16_zm")
        return 120;

    if (weapon == "m16_gl_upgraded_zm")
        return 270;

    if (weapon == "tar21_zm")
        return 240;

    if (weapon == "tar21_upgraded_zm")
        return 360;

    if (weapon == "gl_tar21_zm")
        return 62;

    if (weapon == "type95_zm")
        return 150;

    if (weapon == "type95_upgraded_zm")
        return 270;

    if (weapon == "galil_zm")
        return 315;

    if (weapon == "galil_upgraded_zm")
        return 490;

    if (weapon == "an94_zm")
        return 300;

    if (weapon == "an94_upgraded_zm")
        return 600;

    if (weapon == "xm8_zm")
        return 192;

    if (weapon == "xm8_upgraded_zm")
        return 336;

    if (weapon == "ak47_zm")
        return 240;

    if (weapon == "ak47_upgraded_zm")
        return 270;

    if (weapon == "scar_zm")
        return 270;

    if (weapon == "scar_upgraded_zm")
        return 440;

    if (weapon == "hk416_zm")
        return 240;

    if (weapon == "hk416_upgraded_zm")
        return 360;

    // SHOTGUN

    if (weapon == "870mcs_zm")
        return 48;

    if (weapon == "870mcs_upgraded_zm")
        return 70;

    if (weapon == "saiga12_zm")
        return 30;

    if (weapon == "saiga12_upgraded_zm")
        return 50;

    if (weapon == "srm1216_zm")
        return 48;

    if (weapon == "srm1216_upgraded_zm")
        return 72;

    if (weapon == "ksg_zm")
        return 56;

    if (weapon == "ksg_upgraded_zm")
        return 84;

    // LMG

    if (weapon == "rpd_zm")
        return 400;

    if (weapon == "rpd_upgraded_zm")
        return 750;

    if (weapon == "lsat_zm")
        return 400;

    if (weapon == "lsat_upgraded_zm")
        return 600;

    if (weapon == "hamr_zm")
        return 375;

    if (weapon == "hamr_upgraded_zm")
        return 625;

    if (weapon == "minigun_alcatraz_zm")
        return 300;

    if (weapon == "minigun_alcatraz_upgraded_zm")
        return 550;

    if (weapon == "mg08_zm")
        return 400;

    if (weapon == "mg08_upgraded_zm")
        return 600;

    // LAUNCHER

    if (weapon == "usrpg_zm")
        return 20;

    if (weapon == "usrpg_upgraded_zm")
        return 40;

    if (weapon == "m32_zm")
        return 18;

    if (weapon == "m32_upgraded_zm")
        return 48;

    // SPECIALS

    if (weapon == "knife_ballistic_zm")
        return 4;

    if (weapon == "knife_ballistic_upgraded_zm")
        return 9;

    if (weapon == "knife_ballistic_bowie_zm")
        return 4;

    if (weapon == "knife_ballistic_bowie_upgraded_zm")
        return 9;

    if (weapon == "knife_ballistic_no_melee_zm")
        return 4;

    if (weapon == "knife_ballistic_no_melee_upgraded_zm")
        return 9;

    // WONDER WEAPONS

    if (weapon == "ray_gun_zm")
        return 160;

    if (weapon == "ray_gun_upgraded_zm")
        return 200;

    if (weapon == "raygun_mark2_zm")
        return 162;

    if (weapon == "raygun_mark2_upgraded_zm")
        return 201;

    if (weapon == "slowgun_zm")
        return 88;

    if (weapon == "slowgun_upgraded_zm")
        return 62;

    if (weapon == "slipgun_zm")
        return 88;

    if (weapon == "slipgun_upgraded_zm")
        return 62;

    if (weapon == "blundergat_zm")
        return 60;

    if (weapon == "blundergat_upgraded_zm")
        return 120;

    if (weapon == "blundersplat_zm")
        return 90;

    if (weapon == "blundersplat_upgraded_zm")
        return 150;

    if (weapon == "staff_fire_zm")
        return 90;

    if (weapon == "staff_fire_upgraded_zm")
        return 120;

    if (weapon == "staff_water_zm")
        return 60;

    if (weapon == "staff_water_upgraded_zm")
        return 90;

    if (weapon == "staff_water_zm_cheap")
        return 60;

    if (weapon == "staff_air_zm")
        return 40;

    if (weapon == "staff_air_upgraded_zm")
        return 60;

    if (weapon == "staff_lightning_zm")
        return 120;

    if (weapon == "staff_lightning_upgraded_zm")
        return 180;

    if (weapon == "staff_revive_zm")
        return 62;

    // Pistols

    if (weapon == "c96_zm")
        return 80;

    if (weapon == "c96_upgraded_zm")
        return 100;

    if (weapon == "m1911_zm")
        return 80;

    if (weapon == "m1911_upgraded_zm")
        return 50;

    if (weapon == "python_zm")
        return 84;

    if (weapon == "python_upgraded_zm")
        return 96;

    if (weapon == "rnma_zm")
        return 84;

    if (weapon == "rnma_upgraded_zm")
        return 96;

    if (weapon == "judge_zm")
        return 75;

    if (weapon == "judge_upgraded_zm")
        return 100;

    if (weapon == "kard_zm")
        return 96;

    if (weapon == "kard_upgraded_zm")
        return 180;

    if (weapon == "fiveseven_zm")
        return 120;

    if (weapon == "fiveseven_upgraded_zm")
        return 200;

    if (weapon == "fivesevendw_zm")
        return 225;

    if (weapon == "fivesevendw_upgraded_zm")
        return 295;

    if (weapon == "beretta93r_zm")
        return 105;

    if (weapon == "beretta93r_upgraded_zm")
        return 180;

    if (weapon == "beretta93r_extclip_zm")
        return 168;

    if (weapon == "beretta93r_extclip_upgraded_zm")
        return 270;
}