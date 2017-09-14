<?php

namespace SarchCore;

use pocketmine\plugin\PluginBase;
use SarchCore\Cheat\CheatManager;
use SarchCore\Commands\ClassCommand;
use SarchCore\Commands\BountyCommand;
use SarchCore\Commands\NoteCommand;
use SarchCore\Commands\SpawnerShopCommand;
use SarchCore\CustomWeapons\CustomWeaponsManager;
use SarchCore\Envoys\EnvoyManager;
use SarchCore\Security\SecurityManager;
use SarchCore\Staff\StaffManager;
use SarchCore\Tasks\MobClearTask;
use SarchCore\Bounties\BountyManager;
use SarchCore\Spawners\SilkListener;
use SarchCore\Spawners\ShopListener;

class SarchCore extends PluginBase {

	protected $shoplistener, $bountymanager, $weaponsmanager, $staffmanager, $securitymanager, $envoymanager, $cheatmanager, $silklistener;

	protected static $allowed, $spawners = [];
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents(($this->staffmanager = new StaffManager($this)), $this);
		$this->getServer()->getPluginManager()->registerEvents(($this->cheatmanager = new CheatManager($this)), $this);
		$this->getServer()->getPluginManager()->registerEvents(($this->weaponsmanager = new CustomWeaponsManager($this)), $this);
		$this->getServer()->getPluginManager()->registerEvents(($this->securitymanager = new SecurityManager($this)), $this);
		$this->getServer()->getPluginManager()->registerEvents(($this->envoymanager = new EnvoyManager($this)), $this);
		//////////////////////////////////////////////////////////////////////////////////////////////////
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new MobClearTask($this), 20 * (60 * 5));
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new EnvoyManager($this), 20 * (60 * 5));
		//////////////////////////////////////////////////////////////////////////////////////////////////
		$this->getServer()->getCommandMap()->register("bounty", new BountyCommand($this));
                $this->getServer()->getCommandMap()->register("spawner", new SpawnerShopCommand($this));
		$this->getServer()->getCommandMap()->register("note", new NoteCommand($this));
		//////////////////////////////////////////////////////////////////////////////////////////////////
		if (!file_exists($this->getDataFolder() . 'config.yml')) {
			@mkdir($this->getDataFolder());
			file_put_contents($this->getDataFolder() . 'config.yml', $this->getResource('config.yml'));
		}

		foreach ($this->getConfig()->get('spawners') as $id => $name) {
			self::$spawners[$id] = $name;
		}

		foreach ($this->getConfig()->get('allowed') as $items) {
			self::$allowed[$items] = true;
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////
	public function getEnvoyManager() {
		return $this->envoymanager;
	}

	public function getSecurityManager() {
		return $this->securitymanager;
	}
	public function getShopListener() {
		return $this->shoplistener;
	}
        public function getSilkListener() {
		return $this->silklistener;
	}
        //////////////////////////////////////////////////////////////////////////////////////////////////
        private static function parseColors(string $string) {
		return str_replace('&', TextFormat::ESCAPE, $string);
	}

	public static function retrieveName(int $entityId) {
		return isset(self::$spawners[$entityId]) ? TextFormat::RESET.self::parseColors(self::$spawners[$entityId]).TextFormat::RESET : null;
	}

	public static function isAllowed($itemId) {
		return isset(self::$allowed[$itemId]) ? true : false;
	}
}
