<?php

/** główna klasa stworzenie
 * Class creature
 */
class creature
{
    private $speed;
    private $str;
    private $agi;
    private $live;
    private $livemax;
    private $ap=0;

    /** konstruktor klasy
     * @param $speed
     * @param $str
     * @param $agi
     * @param $live
     */
    public function __construct($speed, $str, $agi, $live, $livemax)
    {
        $this->speed=$speed;
        $this->str=$str;
        $this->agi=$agi;
        $this->live=$live;
        $this->livemax=$livemax;
    }

    /**funkcja pokazujaca akutalne statystyki
     *
     */
    public function stats()
    {
        echo 'Szybkosc: ' . $this->speed . '<br>Sila: ' . $this->str . '<br>Zręczność: ' . $this->agi . '<br>Zycie: ' . $this->live ;
    }

    /** funkcja zwraca speed
     * @return int
     */
    public function getspeed()
    {
        return $this->speed;
    }

    /** funkcja zwraca str
     * @return int
     */
    public function getstr()
    {
        return $this->str;
    }

    /** funkcja zwraca agi
     * @return mixed
     */
    public function getagi()
    {
        return $this->agi;
    }

    /** funkcja zwraca live
     * @return int
     */
    public function getlive()
    {
        return $this->live;
    }

    /** funkcja zwraca livemax
     * @return mixed
     */
    public function getlivemax()
    {
        return $this->livemax;
    }

    /** seter speed
     * @param $speed
     */
    public function setspeed($speed)
    {
        $this->speed=$speed;
    }

    /** seter str
     * @param $str
     */
    public function setstr($str)
    {
        $this->str=$str;
    }

    /** seter agi
     * @param $agi
     */
    public function setagi($agi)
    {
        $this->agi=$agi;
    }

    /** seter live
     * @param $live
     */
    public function setlive($live)
    {
        $this->live=$live;
    }

    /** seter livemax
     * @param $livemax
     */
    public function setlivemax($livemax)
    {
        $this->livemax=$livemax;
    }

    /** seter set_ap
     * @param $ap
     */
    public function set_ap($ap)
    {
        $this->ap=$ap;
    }

    /** geter ap
     * @return int
     */
    public function get_ap()
    {
        return $this->ap;
    }

    /** get AP for ou char
     * @param $zratt
     * @param $zrobr
     * @return float|int
     */
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

    /** chance to attack
     * @param $zratt
     * @param $zrobr
     * @return float|int
     */
    public function SK($zratt, $zrobr)
    {
        $SK = $zratt-$zrobr;
        if ($SK<10)
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