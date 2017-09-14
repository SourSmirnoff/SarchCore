<?php

namespace SarchCore\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\inventory\BaseInventory;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;
use onebone\economyapi\EconomyAPI;
use SarchCore\SarchCore;

class NoteCommand extends BaseCommand {
	
	private $plugin;
	
	public function __construct(SarchCore $plugin) {
        parent::__construct("note", $plugin);
        $this->setUsage(TextFormat::RED . "Usage: /note help");
        $this->plugin = $plugin;
	}
	
	public function execute(CommandSender $sender, $commandLabel, array $args) {
		if(isset($args[0])) {
			if($this->getServer()->getPlayer($args[0]) instanceof Player) {
				if(isset($args[1])) {
					if($args[1]) {
					if (!$sender->hasPermission("note.give")) {
						$sender->sendMessage("You do not have permission to use this command.");
						return False;
					}
					switch(strtolower($args[1])) {
						case 1:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,1,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'25k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 25k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 2:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,2,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'50k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 50k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 3:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,3,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'100k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 100k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 4:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,4,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'150k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 150k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 5:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,5,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'200k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 200k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 6:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,6,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'300k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 300k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 7:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,7,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'400k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 400k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 8:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,8,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'500k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 500k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 9:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,9,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'600k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 600k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 10:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,10,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'700k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 700k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 11:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,11,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'800k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 800k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 12:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,12,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'900k SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 900k');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						case 13:
						    $p = $this->getServer()->getPlayer($args[0]);
						    $note = Item::get(339,13,1);
						    $note->setCustomName(TF::RESET.TF::RED.TF::BOLD.'1M SarchNote!'.TF::RESET."\n".TF::GRAY.'Use for 1 Million $');
						    $p->getInventory()->addItem($note);
						    $p->sendMessage(TF:: RESET .TF:: GREEN ."::" .TF::RESET.TF::BLUE.TF::BOLD."You've Recieved a Sarchonical Note!");
						    return;
						break;
						default:
						    $sender->sendMessage(TF::RED . "Unknown Note!");
						    return;
						break; 
					}
					}
				}
			}
		}
	}
}
