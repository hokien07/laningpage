<?php
//kiemt ra ket qua tra ve
function check_query($resault, $query) {
    global $dbc;
    if(!$resault) {
        die("Query {$query} <br/><br/> MYSQL ERROR: ". mysqli_error($dbc));
    }
}
?>