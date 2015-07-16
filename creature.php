<?php

class creature
{
    private $speed=0;
    private $str=0;
    private $ag0;
    private $live=0;
    private $livemax;
    private $ap=0;
    public function __construct($speed, $str, $agi, $live)
    {
        $this->speed=$speed;
        $this->str==$str;
        $this->agi=$agi;
        $this->live=$live;
    }
    public function stats()
    {
        echo '<p>Szybkosc: ' . $this->speed . '<br>Sila: ' . $this->str . '<br>Zręczność: ' . $this->agi . '<br>Zycie: ' . $this->live . '</p>';
    }
    public function getspeed()
    {
        return $this->speed;
    }
    public function getstr()
    {
        return $this->str;
    }
    public function getagi()
    {
        return $this->agi;
    }
    public function getlive()
    {
        return $this->live;
    }
    public function getlivemax()
    {
        return $this->livemax;
    }
    public function setspeed($speed)
    {
        $this->speed=$speed;
    }
    public function setstr($str)
    {
        $this->str=$str;
    }
    public function setagi($agi)
    {
        $this->agi=$agi;
    }
    public function setlive($live)
    {
        $this->live=$live;
    }
    public function setlivemax($livemax)
    {
        $this->livemax=$livemax;
    }
    public function set_ap($ap)
    {
        $this->ap=$ap;
    }
    public function get_ap()
    {
        return $this->ap;
    }
    public function getap($zratt, $zrobr)
    {
        if($zrobr>=$zratt)
            return 1;
        else
        {
            $tp=$zratt/$zrobr;
            return floor($tp);
        }
    }
    public function SK($zratt, $zrobr)
    {
        $SK = $zratt-$zrobr;
        if ($SK<=0)
        {
            $SK=10;
        }
        else
        {
            $SK=$SK/$zrobr;
            if ($SK > 90)
                $SK=90;
        }
        return $SK;
    }

}

?>