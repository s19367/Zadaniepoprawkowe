<?php
include_once  'creature.php';

/** klasa wiedzmin, dziedziczy z creature
 * Class witcher
 */
class witcher extends creature
{
    private $Ex;
    private $Ex_lvl;
    private $Ex_active;
    private $defcap;
    private $pass;
    private $bonus;

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

    /** ustawia bonus obrony
     * @return bool
     */
    public function def()
    {
        $this->defcap= true;
        $bonus = parent::getagi();
        $tp = $bonus/2;
        $bonus += $tp;
        $this->bonus= $bonus;
        $this->pass=true;
        return $bonus;
    }

    /** zwraca bonus za obrone
     * @return mixed
     */
    public function getdef()
    {
        return $this->bonus;
    }

    /** sprawdza czy jest aktywny bonus obrony
     * @return mixed
     */
    public function defcap()
    {
        return $this->defcap;
    }

    /** usuwa aktywny bonus obrony
     *
     */
    public function del_defcap()
    {
        $this->pass=false;
        $this->defcap=false;
    }

    /** sorwadza czy gracz spasowal
     * @return mixed
     */
    public  function CheckPass()
    {
        return $this->pass;
    }

    /** usuwa aktywny pass
     *
     */
    public function depass()
    {
        $this->pass=false;
    }

    /** ustawia pass na true, zwieksza ap++
     * @return int
     */
    public function pass()
    {
        $this->pass=true;
        return parent::get_ap()+1;
    }




}
?>