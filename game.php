<?php
session_start();
require_once 'witcher.php';
include_once 'creature.php';
$witcher = unserialize($_SESSION['witcher']);
$monster = unserialize($_SESSION['monster']);
$start;
//$witcher->set_ap($witcher->getap($witcher->getspeed(), $monster->getspeed()));
$apw = $witcher->getap($witcher->getspeed(), $monster->getspeed());
$apm = $monster->getap($monster->getspeed(), $witcher->getspeed());

echo $apw . '<br>' . $apm;
$witcher->setap($apw);
$monster->setap($apm);
if ($apw >= $apm)
    $start = 1;
else
    $start = 0;
echo $_POST['btn'];

if ($start == 1)
{
    ?>
    <form action="" method="post" >
        <table>
            <tr><td>
        <button type="submit" value="1" name="btn">Atak</button>
                </td></tr><tr><td>
        <button type="submit" value="2" name="btn">Stworzenie eliksiru 1 poziomu</button>
                </td></tr><tr><td>
        <button type="submit" value="3" name="btn">Stworzenie eliksiru 2 poziomu</button>
                </td></tr><tr><td>
        <button type="submit" value="4" name="btn">Stworzenie eliksiru 3 poziomu</button>
                </td></tr><tr><td>
        <button type="submit" value="5" name="btn">Wypicie eliksiru</button>
                </td></tr><tr><td>
        <button type="submit" value="6" name="btn">Obrona</button>
                </td></tr><tr><td>
        <button type="submit" value="7" name="btn">Pass</button>
                </td>
            </tr>
        </table>
    </form>
    <?php

}
else
{
    echo '<p>Potwor atakuje!</p>';
    $rand = rand(0, 100);
    $SK=$monster->sk($monster->getagi(), $witcher->getagi());
    if ($SK>=$rand)
    {
        $witcher->setlive($witcher->getlive() - $monster->getstr());
        echo '<p> sukces! </p>';
    }
    else
        echo '<p> pudło! </p>';
    $apm--;
    if($apm<=0)
        $start = 1;
    ?>
    <form action="">
        <button type="submit">ok</button>
    </form>
<?php
}
$_SESSION['witcher'] = serialize($witcher);
$_SESSION['monster'] = serialize($monster);

?>