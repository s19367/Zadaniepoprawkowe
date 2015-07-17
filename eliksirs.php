<?php

/** klasa odpowiedzialna za eliksiry
 * Class eliksir
 */
class eliksir
{
    private $eliksir;
    private $eliksir_lvl;
    private $bonus;

    /** konstruktory klasy
     * @param $ex
     * @param $lvl
     */
    public function __construct($ex, $lvl)
    {
        $this->eliksir=$ex;
        $this->eliksir_lvl=$lvl;
    }

    /** Pokazuje posiadany eliksir
     *
     */
    public function show()
    {
        switch ($this->eliksir)
        {
            case 1:
                echo '<p>Eliksir szybkosc</p>';
                break;
            case 2:
                echo '<p>Eliksir sily</p>';
                break;
            case 3:
                echo '<p>Eliksir zycia</p>';
                break;
            default:
                echo '<p>Eliksir error</p>';
        }
    }
    public function create($lvl)
    {
        switch(rand(1,3))
        {
            case 1:

                break;
            case 2:

                break;
            case 3:

                break;
        }
    }

    /** wypicie eliksiru
     * @return int
     */
    public function drink()
    {
        switch ($this->eliksir)
        {
            case 1:
                $bonus = 15* $this->eliksir_lvl;
                $this->bonus=$bonus+15;
                return $this->bonus;
                break;
            case 2:
                $bonus = 10* $this->eliksir_lvl;
                $this->bonus=$bonus+10;
                return $this->bonus;
                break;
            case 3:
                $bonus = 20* $this->eliksir_lvl;
                $this->bonus=$bonus+20;
                return $this->bonus;
                break;
            default:
                echo '<p>Eliksir error</p>';
        }
    }

    /** sprawdza bonus
     * @param $param
     * @return int
     */
    public function bonusCheck ($param)
    {
        if(($param%3==0) && ($this->bonus))
            return $this->bonus;
        else
            return 0;
    }


}