<?php
session_start();
require_once 'witcher.php';
include_once 'creature.php';
$witcher = unserialize($_SESSION['witcher']);
$monster = unserialize($_SESSION['monster']);
$start = unserialize($_SESSION['start']);
$count = unserialize($_SESSION['count']);
//$witcher->set_ap($witcher->getap($witcher->getspeed(), $monster->getspeed()));
$apw = $witcher->get_ap();
$apm = $monster->get_ap();
//echo $start;

if ($monster->getlive() <= 0)
    header('Location: victory.html');
if ($witcher->getlive() <= 0)
    header('Location: defeat.html');
if ((($apw == 0) && ($apm==0)) || $witcher->CheckPass() )
{
    $count++;
    $apw += $witcher->getap($witcher->getspeed(), $monster->getspeed());
    $apm = $monster->getap($monster->getspeed(), $witcher->getspeed());


    $witcher->set_ap($apw);
    $monster->set_ap($apm);
    if ($apw >= $apm)
        $start = 1;
    else
        $start = 0;
    if ($witcher->CheckPass())
    {
        $start = 0;
        $witcher->depass();
    }
}

echo 'Wiedzmin_AP: '.$apw . '<br>Potwor_AP: ' . $apm;
if ($start == 1)
{
    ?>
    <form action="result.php" method="post" >
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
    if ($apw==0)
        $start=0;
}
else
{
    echo '<p>Potwor atakuje!</p>';

    $rand = rand(0, 100);
    $SK=$monster->sk($monster->getagi(), $witcher->getagi());
    if ($rand<=$SK)
    {
        $witcher->setlive($witcher->getlive() - $monster->getstr());
        echo '<p> sukces! </p>';
    }
    else
        echo '<p> pudło! </p>';
    $apm--;
    $monster->set_ap($apm);
    if($apm<=0)
    {
        $start = 1;
        if ($witcher->defcap())
        {
            $agi = $witcher->getagi();
            $witcher->setagi($agi - $witcher->getdef());
            $witcher->del_defcap();
        }
    }
    ?>
    <form action="">
        <button type="submit">ok</button>
    </form>

<?php
}
$witcher->stats();
echo '<br>';
$monster->stats();
$_SESSION['witcher'] = serialize($witcher);
$_SESSION['monster'] = serialize($monster);
$_SESSION['start'] = serialize($start);
$_SESSION['count'] = serialize($count);
//echo $apm;
?>