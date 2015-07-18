<?php
session_start();
require_once 'witcher.php';
include_once 'creature.php';
include_once 'eliksir.php';
$witcher = unserialize($_SESSION['witcher']);
$monster = unserialize($_SESSION['monster']);
$ap = $witcher->get_ap();
switch($_POST['btn'])
{
    case 1:
        if($ap-1 <= 0)
        {
            echo '<p>Brak AP!</p>';
            break;
        }
        $rand = rand(0, 100);
        $SK=$witcher->sk($witcher->getagi(), $monster->getagi());
        if ($SK>=$rand)
        {
            $monster->setlive($monster->getlive() - $witcher->getstr());
            echo '<p> sukces! </p>';
        }
        else
            echo '<p> pudło! </p>';
        $ap--;
        break;
    case 2:

        break;
    case 3:
        break;
    case 4:
        break;
    case 5:
        break;
    case 6:
        break;
    case 6:
        break;
    default:
        echo '<p> action error </p>';
}
?>