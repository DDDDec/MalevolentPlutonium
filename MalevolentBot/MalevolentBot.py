import os
import discord
from discord import app_commands
from dotenv import load_dotenv

load_dotenv()

BOT_TOKEN = os.getenv("DISCORD_BOT_TOKEN")

intents = discord.Intents.default()
intents.message_content = True


class MyClient(discord.Client):
    def __init__(self, *, intents: discord.Intents):
        super().__init__(intents=intents)
        self.tree = app_commands.CommandTree(self)

    async def setup_hook(self):
        await self.tree.sync()


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


@client.tree.error
async def on_app_command_error(interaction: discord.Interaction, error: app_commands.AppCommandError):
    print(f"Error in command {interaction.command}: {error}")
    if interaction.response.is_done():
        await interaction.followup.send("Something went wrong running that command.", ephemeral=True)
    else:
        await interaction.response.send_message("Something went wrong running that command.", ephemeral=True)


if __name__ == "__main__":
    if not BOT_TOKEN:
        raise RuntimeError("DISCORD_BOT_TOKEN is not set in your .env file.")

    client.run(BOT_TOKEN)

