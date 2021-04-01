<?php
function rowCount($pdo,$sql){
    $rowNum = $pdo->prepare($sql);
    $rowNum->execute();
    return $rowNum->rowCount();
}
?>