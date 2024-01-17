<?php
function atOption($a, $b) {
    $selected = ($a === $b) ? "selected" : "";
    return "value='$b' $selected";
}
?>