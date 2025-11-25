////////////////////////////////////////
// Include base game scripts          //
////////////////////////////////////////
#include maps/mp/_utility;            //
#include common_scripts/utility;      //
#include maps/mp/zombies/_zm_score;   //
#include maps/mp/zombies/_zm_utility; //
////////////////////////////////////////

///////////////////////////////////////////////
// Score Multiplier Function                 //
///////////////////////////////////////////////
// Changes how much score you get depending  //
// on the multiplier of the players prestige //
///////////////////////////////////////////////
core_score(event, mod, hit_location, is_dog, zombie_team, damage_weapon)
{
    if ( level.intermission )
        return;

    if ( !is_player_valid( self ) )
        return;

    player_data = strToK(self.pers["player-data"], ";");

    player_points = 0;
    team_points = 0;
    multiplier = get_points_multiplier( self );

    switch ( event )
    {
        case "death":
            player_points = get_zombie_death_player_points();
            team_points = get_zombie_death_team_points();
            points = self player_add_points_kill_bonus( mod, hit_location );

            self.score += 10 * int(player_data[2]);

            if ( level.zombie_vars[self.team]["zombie_powerup_insta_kill_on"] == 1 && mod == "MOD_UNKNOWN" )
                points = points * 2;

            player_points = player_points + points;

            if ( team_points > 0 )
                team_points = team_points + points;

            if ( mod == "MOD_GRENADE" || mod == "MOD_GRENADE_SPLASH" )
            {
                self maps\mp\zombies\_zm_stats::increment_client_stat( "grenade_kills" );
                self maps\mp\zombies\_zm_stats::increment_player_stat( "grenade_kills" );
            }

            break;
        case "ballistic_knife_death":
            self.score += 10 * int(player_data[2]);
            break;
        case "damage_light":
            self.score += 10 * int(player_data[2]);
            break;
        case "damage":
            self.score += 10 * int(player_data[2]);
            break;
        case "damage_ads":
            self.score += 10 * int(player_data[2]);
            break;
        case "carpenter_powerup":
        case "rebuild_board":
            self.score += 10 * int(player_data[2]);
            break;
        case "bonus_points_powerup":
            self.score += 10 * int(player_data[2]);
            break;
        case "nuke_powerup":
            self.score += 400 * int(player_data[2]);
            break;
        case "jetgun_fling":
        case "riotshield_fling":
        case "thundergun_fling":
            self.score += 10 * int(player_data[2]);
            break;
        case "hacker_transfer":
            self.score += 10 * int(player_data[2]);
            break;
        case "reviver":
            self.score += 10 * int(player_data[2]);
            break;
        case "vulture":
            self.score += 10 * int(player_data[2]);
            break;
        case "build_wallbuy":
            self.score += 10 * int(player_data[2]);
            break;
        default:
            assert( 0, "Unknown point event" );
            break;
    }

    player_points = multiplier * round_up_score( player_points, 5 );
    team_points = multiplier * round_up_score( team_points, 5 );

    if ( is_true( level.pers_upgrade_pistol_points ) )
        player_points = self maps\mp\zombies\_zm_pers_upgrades_functions::pers_upgrade_pistol_points_set_score( player_points, event, mod, damage_weapon );

    self add_to_player_score( player_points );
    self.pers["score"] = self.score;

    if ( isdefined( level._game_module_point_adjustment ) )
        level [[ level._game_module_point_adjustment ]]( self, zombie_team, player_points );
}