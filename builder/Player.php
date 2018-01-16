<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/19/16
 * Time: 5:38 AM
 */

namespace Builder;

class Player
{
    private $playerName;

    public function setplayerName($playerName)
    {
        $this->playerName = $playerName;
    }

    public function render()
    {
        return $this->playerName;
    }
}

interface Builder
{
    public function buildPlayer();

    public function getPlayer();
}

class FlashBuilder implements Builder
{
    private $player;

    public function __construct()
    {
        $this->player = new Player();
    }

    public function buildPlayer()
    {
        $this->player->setplayerName("Player w Flash");
    }

    public function getPlayer()
    {
        return $this->player;
    }
}

class HTMLBuilder implements Builder
{
    private $player;

    public function __construct()
    {
        $this->player = new Player();
    }

    public function buildPlayer()
    {
        $this->player->setplayerName("Player w HTML5");
    }

    public function getPlayer()
    {
        return $this->player;
    }
}

class Director
{
    private $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function construct()
    {
        $this->builder->buildPlayer();
    }

    public function getResult()
    {
        return $this->builder->getPlayer();
    }
}

// testy
$html = new HTMLBuilder();
$flash = new FlashBuilder();
$director = new Director($flash);
$director->construct();
$player = $director->getResult();
echo $player->render(); // wyswietli "player w flash"

$director2 = new Director($html);
$director2->construct();
$player2 = $director2->getResult();
echo $player2->render(); // wyswietli "player w HTML5"