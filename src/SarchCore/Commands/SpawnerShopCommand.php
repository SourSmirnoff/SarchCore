<?php

namespace SarchCore\Commands;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use onebone\economyapi\EconomyAPI;
use SarchCore\SarchCore;

class SpawnerShopCommand extends BaseCommand{

    private $plugin;

    public function __construct(SarchCore $plugin){
        parent::__construct("spawner", $plugin);
        $this->setUsage(TextFormat::RED . "Usage: /spawner <type:list>");
        $this->plugin = $plugin;
        $this->prices = (new Config($this->plugin->getDataFolder() . "/buyables.yml", Config::YAML))->getAll();
    }
    
    public $names = ["blaze" => 43, "cow" => 11, "pig" => 12, "sheep" => 13, "creeper" => 33, "spider" => 35, "cavespider" => 40, "bat" => 19, "chicken" => 10, "enderman" => 38, "horse" => 23, "husk" => 47, "irongolem" => 20, "lavaslime" => 42, "mooshroom" => 16, "rabbit" => 18, "snowgolem" => 21, "witch" => 45, "wolf" => 14, "zombie" => 32];

    public function execute(CommandSender $sender, $commandLabel, array $args){
        if(!isset($args[0])){
            $sender->sendMessage(TextFormat::RED . "Usage: /spawner <type:list>");
        return false;
        }
        switch(strtolower($args[0])){
        case "list":
        foreach($this->prices as $name => $price){
            $sender->sendMessage(TextFormat::GOLD . $name . TextFormat::GRAY . ":" . TextFormat::AQUA . " $" . $price);
        }
        break;
        return;
        }
        foreach($this->prices as $name => $price){
            if(strtolower($args[0]) === $name){
                if($this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender->getName()) > $price){
                    $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), $price, true);
                    $it = Item::get(Item::MONSTER_SPAWNER, $this->names[$name], 1);
                    $sender->getInventory()->addItem($it);
                    $it->setCustomName(TextFormat::GOLD . $name . ' Spawner');
                    $sender->sendMessage(TextFormat::AQUA . "Bought one " . $name . " spawner!");
                    return True;
                }elseif($this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender->getName()) < $price){
                $sender->sendMessage(TextFormat::RED . "Not enough money to buy " . $name . " Spawner");
                }
            }
        }
    }
}
