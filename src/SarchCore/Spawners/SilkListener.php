<?php

namespace SarchCore\Spawners;

use pocketmine\event\Listener;
use pocketmine\event\block\{BlockBreakEvent, BlockPlaceEvent};
use pocketmine\item\enchantment\Enchantment;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\tile\{MobSpawner, Tile};
use pocketmine\item\Item;
use pocketmine\nbt\tag\{CompoundTag, IntTag, StringTag};
use pocketmine\network\mcpe\protocol\Info;
use pocketmine\event\server\DataPacketSendEvent;
use SarchCore\SarchCore;

class SilkListener implements Listener {

	public function onBreak(BlockBreakEvent $event) {
		$player = $event->getPlayer();
		if (!$player->hasPermission('silkspawners.allow')) return true;
		$block = $event->getBlock();
		$item = $event->getItem();
		if ($block->getId() === Block::MONSTER_SPAWNER) {
			if (SilkSpawners::isAllowed($item->getId())) {
				if ($item->hasEnchantment(Enchantment::TYPE_MINING_SILK_TOUCH)) {
					$id = 0; $pos = new Vector3($block->x, $block->y, $block->z); $world = $block->getLevel();
					if (($mobspawner = $world->getTile($pos)) instanceof MobSpawner) {
						$id = $mobspawner->namedtag['EntityId'];
						$mobspawner->close();
					}
					$drop = Item::get(Item::MONSTER_SPAWNER, $id);
					$name = SilkSpawners::retrieveName($id);
					if (!is_null($name)) $drop->setCustomName($name);
					$world->dropItem($pos, $drop);
					$world->setBlock($pos, Block::get(Block::AIR));
					return true;
				}
			}
		}
	}

	public function onPlace(BlockPlaceEvent $event) {
		$block = $event->getBlock();
		$player = $event->getPlayer();
		$item = $event->getItem();
		if ($item->getId() === Item::MONSTER_SPAWNER) {
			if (!is_null(SilkSpawners::retrieveName($entityId = $item->getDamage()))) {
				$pos = new Vector3($block->x, $block->y, $block->z);
				$world = $block->getLevel();
				$world->setBlock($pos, Block::get(Block::MONSTER_SPAWNER));
				$nbt = new CompoundTag('', [
					new StringTag('id', 'MobSpawner'),
					new IntTag('x', $pos->x),
					new IntTag('y', $pos->y),
					new IntTag('z', $pos->z),
					new IntTag('EntityId', $entityId)
				]);
				Tile::createTile('MobSpawner', $world->getChunk($pos->x >> 4, $pos->z >> 4), $nbt);
				$item->setCount($item->getCount() - 1);
				$player->getInventory()->setItemInHand($item);
				$event->setCancelled();
			}
		}
	}
}
