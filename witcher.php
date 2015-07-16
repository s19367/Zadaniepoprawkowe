<?php
require_once  'creature.php';
class witcher extends creature
{
    private $Ex;
    private $Ex_lvl;
    private $Ex_active;

    /**
     * @param $speed
     * @param $str
     * @param $agi
     * @param $live
     * @param $livemax
     */
    public function __construct($speed, $str, $agi, $live, $livemax)
    {
        parent::__construct($speed, $str, $agi, $live, $livemax);
    }

    /**
     * @return bool
     */
    public function def()
    {
        $i=parent::getagi();
        $i+=$i;
        parent::setagi($i);
        return true;
    }

    /**
     * @return int
     */
    public function pass()
    {
        return parent::get_ap()+1;
    }

    /**
     * @param $i
     */
    public function crtEx($i)
    {
        switch(rand(1, 3))
        {
            case 1:
                $this->Ex=1;
                $this->Ex_lvl=$i;
                break;
            case 2:
                $this->Ex=2;
                $this->Ex_lvl=$i;
                break;
            case 3:
                $this->Ex=3;
                $this->Ex_lvl=$i;
                break;
            default:
                echo'blad tworzenia eliksiru';
                break;
        }
    }

    /**
     * @param $Ex
     * @return int|null
     */
    public function drinkEx($Ex)
    {
        if( $this->Ex_active)
        {
            echo "Eliksir aktywny";
            return null;
        }
        switch($Ex)
        {
            case 1:
                $speed=parent::getspeed();
                $speed==$this->Ex_lvl*10;
                $this->Ex_active=true;
                return $speed;
                break;
            case 2:
                $str=parent::getstr();
                $str=$this->Ex_lvl-10;
                $this->Ex_active=true;
                return $str;
                break;
            case 3:
                $live=parent::getlivemax();
                $sLive=$this->Ex_lvl*20;
                $mLive=parent::getlive()+$sLive;
                if ($mLive>$live)
                    return $live;
                else
                    return $mLive;
                break;
            default:
                echo 'Elixir error';
        }
    }



}
?>