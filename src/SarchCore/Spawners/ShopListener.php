<?php

namespace SarchCore\Spawners;

use pocketmine\event\Listener;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\block\MonsterSpawner;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\tile\Tile;
use pocketmine\tile\MobSpawner;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use SarchCore\SarchCore;

class ShopListener implements Listener{

	protected $plugin;

	public function __construct(SarchCore $plugin)
	{
		$this->plugin = $plugin;
	}

	public function onPlace(BlockPlaceEvent $ev)
	{
		if($ev->isCancelled())
		{
			return false;
		}
		if($ev->getBlock() instanceof MonsterSpawner)
		{
			$ev->getBlock()->getLevel()->setBlock(new Position($ev->getBlock()->x, $ev->getBlock()->y, $ev->getBlock()->z), new MonsterSpawner($ev->getItem()->getDamage()));
			$t =  new CompoundTag("", [
				  new StringTag("id", Tile::MOB_SPAWNER),
				  new IntTag("x", (int) $ev->getBlock()->x),
				  new IntTag("y", (int) $ev->getBlock()->y),
				  new IntTag("z", (int) $ev->getBlock()->z),
				  new IntTag("EntityId", (int) $ev->getItem()->getDamage())
			]);
			$tile = Tile::createTile("MobSpawner", $ev->getPlayer()->getLevel(), $t);
			$tile->setEntityId($ev->getItem()->getDamage());
			$ev->getPlayer()->getInventory()->setItemInHand(Item::get($ev->getPlayer()->getInventory()->getItemInHand()->getId(), $ev->getPlayer()->getInventory()->getItemInHand()->getDamage(), ($ev->getPlayer()->getInventory()->getItemInHand()->getCount() - 1)));
			$ev->setCancelled(true);
		}
	}
}
