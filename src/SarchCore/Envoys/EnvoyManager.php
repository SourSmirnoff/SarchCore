<?php
namespace SarchCore\Envoys;

use SarchCore\SarchCore;

use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\nbt\NBT;

use pocketmine\block\Block;
use pocketmine\block\Chest as ChestBlock;

use pocketmine\tile\Tile;
use pocketmine\tile\Chest as ChestTile;

use pocketmine\math\Vector3;

use pocketmine\item\Item;

use pocketmine\network\mcpe\protocol\AddEntityPacket;

use pocketmine\entity\Entity;

class EnvoyManager implements Listener{

  private $plugin, $envoys;

  public function __construct(SarchCore $plugin) {
    $this->plugin = $plugin;
    $this->envoys = [];
  }

  public function random() {
    $arr = [];
    $lev = $this->plugin->getServer()->getDefaultLevel();
    $loc = $lev->getSpawnLocation();
    $n = $this->plugin->getServer()->getSpawnRadius();
    for($i = 0; $i < 10; $i++) {
      $x = mt_rand($loc->getX(), $loc->getX() + $n);
      $z = mt_rand($loc->getX(), $loc->getZ() + $n);

      $y = $lev->getHighestBlockAt($x, $z)->getY()++;

      $arr[] = new Vector3($x, $y, $z);
      continue;
    }

    return $arr;
  }

  public function items() {
    return [];
  }

  public function spawn() {
    $lev = $this->plugin->getServer()->getDefaultLevel();
    foreach($this->envoys as $envoy) {
      $lev->removeTile($envoy);
    }

    $this->envoys = [];

    foreach($this->random as $pos) {
      $nbt = new CompoundTag("", [
        new ListTag("Items", []),
        new StringTag("id", Tile::CHEST),
        new IntTag("x", $pos->x),
        new IntTag("y", $pox->y),
        new IntTag("z", $pos->z)
      ]);
      $nbt->Items->setTagType(NBT::TAG_Compound);

      $lev->setBlock($pos, new ChestBlock());
      $t = Tile::createTile("Chest", $lev, $nbt);
      if(!$t instanceof ChestTile) {
        continue;
      }

      $inv = $t->getInventory();
      $inv->setContents($this->items());

      $lev->addTile($t);

      $pk = new AddEntityPacket();
      $pk->type = 93;
      $pk->eid = Entity::$entityCount++;
      $pk->metadata =[];
      $pk->speedX = 0;
      $pk->speedY = 0;
      $pk->speedZ = 0;
      $pk->yaw = 0;
      $pk->pitch = 0;
      $pk->x = $envoy->x;
      $pk->y = $envoy->y;
      $pk->z = $envoy->z;

      $this->plugin->getServer()->broadcastMessage($pk);

      $this->envoys[] = $t;
    }
  }
}