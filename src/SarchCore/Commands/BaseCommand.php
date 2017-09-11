<?php

namespace SarchCore\Commands;

use SarchCore\SarchCore;
use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;

abstract class BaseCommand extends Command implements PluginIdentifiableCommand{

    private $plugin;

    public function __construct(String $name, SarchCore $plugin)
    {
        parent::__construct($name);
        $this->plugin = $plugin;
        $this->usageMessage = "";
    }

    public function getPlugin()
    {
        return $this->plugin;
    }
}