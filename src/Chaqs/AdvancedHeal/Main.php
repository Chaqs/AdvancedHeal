<?php



namespace Chaqs\AdvancedHeal;



use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\plugin\Plugin;




class Main extends PluginBase implements Listener{
    

    public function onEnable(): void{

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        

    }



    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        switch(strtolower($label)){
            case "heal":
                if(!$sender instanceof Player) return false;
                if($sender->hasPermission("command.advancedheal")){
                    $beforehealth = $sender->getHealth();
                    $maxhealth = $sender->getMaxHealth();
                    $sender->setHealth(20);
                    $currenthealth = $sender->getHealth();
                    $sender->sendMessage("§6You Have Been Healed! §r \nResults: \n §cHealth-Changes:§e " . $beforehealth . "§7/§e" . $maxhealth . "§7 ->§e " . $currenthealth . "§7/§e" . $maxhealth);
                    $beforefood = $sender->getFood();
                    $maxfood = $sender->getMaxFood();
                    $sender->setFood(20);
                    $currentfood = $sender->getFood();
                    $sender->sendMessage("§cFood-Changes:§e " . $beforefood . "§7/§e" . $maxfood . "§7 ->§e " . $currentfood . "§7/§e" . $maxfood);
                    
                }else{
                    $sender->sendMessage("Invalid Permissions");
                    
                }

                break;

        }

        return true;

    }

}
