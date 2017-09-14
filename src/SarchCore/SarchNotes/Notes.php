<?php
namespace SarchCore\SarchNotes;

use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\inventory\BaseInventory;
use pocketmine\Player;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;

class Notes implements Listener {

    public function onInteract(PlayerInteractEvent $event) {
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
            if($item->getId() == 339 and $item->getDamage() == 1) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 25k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 25000);
                $player->getInventory()->removeItem(Item::get(339,1,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 2) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 50k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 50000);
                $player->getInventory()->removeItem(Item::get(339,2,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 3) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 100k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 100000);
                $player->getInventory()->removeItem(Item::get(339,3,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 4) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 150k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 150000);
                $player->getInventory()->removeItem(Item::get(339,4,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 5) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 200k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 200000);
                $player->getInventory()->removeItem(Item::get(339,5,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 6) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 300k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 300000);
                $player->getInventory()->removeItem(Item::get(339,6,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 7) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 400k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 400000);
                $player->getInventory()->removeItem(Item::get(339,7,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 8) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 500k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 500000);
                $player->getInventory()->removeItem(Item::get(339,8,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 9) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 600k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 600000);
                $player->getInventory()->removeItem(Item::get(339,9,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 10) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 700k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 700000);
                $player->getInventory()->removeItem(Item::get(339,10,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 11) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 800k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 800000);
                $player->getInventory()->removeItem(Item::get(339,11,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 12) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 900k SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 900000);
                $player->getInventory()->removeItem(Item::get(339,12,1));
            }
            if($item->getId() == 339 and $item->getDamage() == 13) {
                $player->sendMessage(TF::RESET.TF::RED.TF::BOLD."You've Redeemed Your 1 Million $$ SarchNote!");
                $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), 1000000);
                $player->getInventory()->removeItem(Item::get(339,13,1));
            }
    }
}
