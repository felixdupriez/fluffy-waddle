<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author Felix Dupriez
 */
class FelixdupriezPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        $dream_team = array('Etienneelg', 'Shiinsekai', 'GHope', 'PacoTheGreat', 'Christaupher', 'Benli06', 'Galtar95');
        $delegues = array('Akatsuki95', 'Vegan60');
        $oppName = $this->result->getStatsFor($this->opponentSide)['name'];
        if (in_array($oppName, $dream_team))
            return parent::friendChoice();
        if (in_array($oppName, $delegues))
            return parent::foeChoice();
        if ($this->result->getNbRound() == 0)
            return parent::foeChoice();
        $friend = 0;
        $foe = 0;
        if ($this->result->getLastChoiceFor($this->opponentSide) == 'friend') {
            foreach ($this->result->getChoicesFor($this->opponentSide) as $value) {
                if ($value == 'friend')
                    $friend += 1;
                else
                    $foe += 1;
            }
            if ($friend > $foe)
                return parent::friendChoice();
        }
        else
            return parent::foeChoice();
        return parent::foeChoice();
    }
};