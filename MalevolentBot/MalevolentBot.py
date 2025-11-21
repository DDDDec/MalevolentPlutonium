import os
import discord
from discord import app_commands
from dotenv import load_dotenv
import mysql.connector
from mysql.connector import pooling

load_dotenv()

BOT_TOKEN = os.getenv("DISCORD_BOT_TOKEN")

DB_CONFIG = {
    "host": os.getenv("DB_HOST", "localhost"),
    "port": int(os.getenv("DB_PORT", "3306")),
    "user": os.getenv("DB_USER", "root"),
    "password": os.getenv("DB_PASSWORD", ""),
    "database": os.getenv("DB_NAME", ""),
}

intents = discord.Intents.default()
intents.message_content = True


class MyClient(discord.Client):
    def __init__(self, *, intents: discord.Intents):
        super().__init__(intents=intents)
        self.tree = app_commands.CommandTree(self)

        self.db_pool = pooling.MySQLConnectionPool(
            pool_name="discord_bot_pool",
            pool_size=5,
            **DB_CONFIG,
        )

    async def setup_hook(self):
        await self.tree.sync()

    def get_db_connection(self):
        """Get a connection from the pool."""
        return self.db_pool.get_connection()


client = MyClient(intents=intents)


@client.event
async def on_ready():
    print(f"Logged in as {client.user} (ID: {client.user.id})")
    print("------")


@client.tree.command(name="ping", description="Check if the bot is alive")
async def ping(interaction: discord.Interaction):
    await interaction.response.send_message("Pong!")


@client.tree.command(name="echo", description="Echo back your message")
@app_commands.describe(text="The text for the bot to repeat")
async def echo(interaction: discord.Interaction, text: str):
    await interaction.response.send_message(text)


@client.tree.command(
    name="balance",
    description="Show your balance (from MySQL) or another user's balance.",
)
@app_commands.describe(
    user="User to check the balance of (defaults to you)"
)
async def balance(interaction: discord.Interaction, user: discord.User | None = None):
    target = user or interaction.user
    query = "SELECT player_money FROM user_statistics WHERE id = %s"

    try:
        conn = client.get_db_connection()
        cursor = conn.cursor(dictionary=True)
        cursor.execute(query, (str(target.id),))
        row = cursor.fetchone()
        cursor.close()
        conn.close()

        if not row:
            await interaction.response.send_message(
                f"No account found for {target.mention}.",
                ephemeral=True,
            )
            return

        balance_value = row["player_money"]
        if user:
            msg = f"{target.mention} has a balance of {balance_value}."
        else:
            msg = f"You have a balance of {balance_value}."

        await interaction.response.send_message(msg)
    except Exception as e:
        print(f"MySQL error in /balance: {e}")
        if interaction.response.is_done():
            await interaction.followup.send(
                "Database error while fetching balance.",
                ephemeral=True,
            )
        else:
            await interaction.response.send_message(
                "Database error while fetching balance.",
                ephemeral=True,
            )


@client.tree.error
async def on_app_command_error(
    interaction: discord.Interaction,
    error: app_commands.AppCommandError,
):
    print(f"Error in command {interaction.command}: {error}")
    if interaction.response.is_done():
        await interaction.followup.send(
            "Something went wrong running that command.",
            ephemeral=True,
        )
    else:
        await interaction.response.send_message(
            "Something went wrong running that command.",
            ephemeral=True,
        )


if __name__ == "__main__":
    if not BOT_TOKEN:
        raise RuntimeError("DISCORD_BOT_TOKEN is not set in your .env file.")

    if not DB_CONFIG["database"]:
        raise RuntimeError("DB_NAME is not set in your .env file.")

    client.run(BOT_TOKEN)
