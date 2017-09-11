<?php
namespace SarchCore;

use pocketmine\plugin\PluginBase;

use SarchCore\CustomWeapons\CustomWeaponsManager;
use SarchCore\Cheat\CheatManager;
use SarchCore\Staff\StaffManager;
use SarchCore\Security\SecurityManager;

use SarchCore\Tasks\MobClearTask;

use SarchCore\Commands\ClassCommand;


class SarchCore extends PluginBase{

	protected $weaponsmanager, $staffmanager, $securitymanager, $envoymanager;

	public function onEnable() {
		@mkdir($this->getDataFolder());
		@mkdir($this->getDataFolder() . "/factions");

		$this->getServer()->getPluginManager()->registerEvents(($this->staffmanager = new StaffManager($this)), $this);
		$this->getServer()->getPluginManager()->registerEvents(($this->cheatmanager = new CheatManager($this)), $this);
		$this->getServer()->getPluginManager()->registerEvents(($this->weaponsmanager = new CustomWeaponsManager($this)), $this);
		$this->getServer()->getPluginManager()->registerEvents(($this->securitymanager = new SecurityManager($this)), $this);
                $this->getServer()->getPluginManager()->registerEvents(($this->envoymanager = new EnvoyManager($this)), $this);

		// Classes Removed $this->getServer()->getCommandMap()->register("class", new ClassCommand($this));
                
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new MobClearTask($this), 20 * (60 * 5));
                $this->getServer()->getScheduler()->scheduleRepeatingTask(new EnvoyManager($this), 20 * (60 * 5));
	}
        
        public function getEnvoyManager() {
                return $this->envoymanager;
        }

	public function getSecurityManager() {
		return $this->securitymanager;
	}
}