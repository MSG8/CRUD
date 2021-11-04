<?php
switch ($_GET['op']) 
{
    case 'anadir':
        header("Location: ../index.php?op=".$_GET['op']."");
        break;
    case 'borrar':
        header("Location: ../index.php?id=".$_GET['id']."&op=".$_GET['op']."");
        break;
    case 'mirar':
        header("Location: ../index.php?id=".$_GET['id']."&op=".$_GET['op']."");
        break;
    case 'modificar':
        header("Location: ../index.php?id=".$_GET['id']."&op=".$_GET['op']."");
        break;
    case 'buscarDni':
        header("Location: ../index.php?op=".$_GET['op']."");
        break;
    case 'buscarNombre':
        header("Location: ../index.php?op=".$_GET['op']."");
        break;
    default:
        header("Location: ../index.php");
        break;
}
?>