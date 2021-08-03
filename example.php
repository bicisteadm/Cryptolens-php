<?php

include "vendor/autoload.php";

use bicisteadm\Cryptolens;

$licv = new Cryptolens("1234", "fPDKLpOdOMgPCtKelvXKVzOjOhZKESebxRgRtOLhUnmnMJbowzHNedIMdJUraViFpiEUlnHr");

$licv = $licv->keyVerification("XXXXX-XXXXX-XXXXX-XXXXX");

if ($licv) {
    echo "The key is valid";
} else {
    echo "The key is not valid";
}