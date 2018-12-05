<?php

declare(strict_types=1);

namespace Zedstar16\SimpleGamemode;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{


	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
	    $player = $this->getServer()->getPlayer($sender->getName());
	    $serv = $this->getServer();
	    $nocmd = TextFormat::RED."You do not have permission to use this command";
	    $notother = TextFormat::RED."You do not have permission to change the gamemode of other players";
	    switch($command->getName()){
	        case "gms":
	            if($sender->hasPermission("gms.command")){
                    if(count($args) < 1) {
                        $sender->sendMessage("Gamemode changed to Survival Mode");
                        $player->setGamemode(0);
                    }
				      if(isset($args[0])){
                         $subject = $serv->getPlayer($args[0]);
				         if($sender->hasPermission("gms.other")){
                             $subject->setGamemode(0);
                             $sender->sendMessage("Changed ". $subject->getName()."'s gamemode to Survival mode");
                             $subject->sendMessage("Your gamemode was changed to Survival Mode");
				         }else{
				             $sender->sendMessage($notother);
                             return true;
				         }
				      }
				   }else{$sender->sendMessage($nocmd);
				}
	        break;

            case "gmc":
                if($sender->hasPermission("gmc.command")){
                    if(count($args) < 1) {
                        $sender->sendMessage("Gamemode changed to Creative Mode");
                        $player->setGamemode(1);
                    }
                    if(isset($args[0])){
                        $subject = $serv->getPlayer($args[0]);
                        if($sender->hasPermission("gmc.other")){
                            $subject->setGamemode(1);
                            $sender->sendMessage("Changed ". $subject->getName()."'s gamemode to Creative mode");
                            $subject->sendMessage("Your gamemode was changed to Creative Mode");
                        }else{
                            $sender->sendMessage($notother);
                            return true;
                        }
                    }
                }else{$sender->sendMessage($nocmd);
                }
            break;

            case "gmspc":
                if($sender->hasPermission("gmspc.command")){
                    if(count($args) < 1) {
                        $sender->sendMessage("Gamemode changed to Spectator Mode");
                        $player->setGamemode(3);
                    }
                    if(isset($args[0])){
                        $subject = $serv->getPlayer($args[0]);
                        if($sender->hasPermission("gmspc.other")){
                            $subject->setGamemode(3);
                            $sender->sendMessage("Changed ".$subject->getName()."'s gamemode to Spectator mode");
                            $subject->sendMessage("Your gamemode was changed to Spectator Mode");
                        }else{
                            $sender->sendMessage($notother);
                            return true;
                        }
                    }
                }else{$sender->sendMessage($nocmd);
                }
            break;
        }
      return true;
	}
}
