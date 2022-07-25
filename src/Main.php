<?php

namespace AhmetAB01\CustomForm;

use pocketmine\Server;
use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\Command\Command;
use pocketmine\command\CommandSender;

use jojoe77777\FormAPI\CustomForm;

class Main extends PluginBase{
    
    public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args): bool{
        
        if($cmd->getName() == "customform"){
            $this->form($sender);
        }  
        return true;
    }
    public function form($player){
        $dropdownMenu = ["Gamer 1", "Gamer 2"];
        $form = new CustomForm(function (Player $player, array $data){
            if($data === null){
                return true;
            }
            switch($data[1]){
                case true:
                    $player->sendMessage("Open");
                break;
                
                case false:
                    $player->sendMessage("Closed");
                break;
            }
            switch($data[2]){
                case 0:
                    $player->sendMessage("Gamer 1");
                break;
                
                case 1:
                    $player->sendMessage("Gamer 2");
                break;
            }
        });
        $form->setTitle("Server Name");
        $form->addLabel("");
        $form->addToggle("Toogle", false);
        $form->addDropdown("Dropdown Content", $dropdownMenu);
        $form->sendToPlayer($player);
        return $form;
    }
}
