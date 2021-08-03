# Cryptolens PHP

This repository contains functions for interacting with the Cryptolens
Web API from PHP. Currently only verification of keys is supported.


## Installation
```
composer require bicisteadm/cryptolens-php
```

## Code example

```php
<?php

include "vendor/autoload.php";

use bicisteadm\Cryptolens;

$licv = new Cryptolens(
    // Product Id
    "1234", 
    // Access token
    "fPDKLpOdOMgPCtKelvXKVzOjOhZKESebxRgRtOLhUnmnMJbowzHNedIMdJUraViFpiEUlnHr"
);

$licv = $licv->keyVerification(
    // License Key
    "XXXXX-XXXXX-XXXXX-XXXXX"
);

if ($licv) {
    echo "The key is valid";
} else {
    echo "The key is not valid";
}
```

The code above uses our testing access token, product id and license key.
In a real values for you can be obtained as follows:

 * Access tokens can be created at https://app.cryptolens.io/User/AccessToken (remember to check 'Activate' and keep everything else unchanged)
 * The product id is found by selecting the relevant product from the list of products
   (https://app.cryptolens.io/Product), and then the product id is found above the list
   of keys.
 * The license key would be obtained from the user in an application dependant way.
