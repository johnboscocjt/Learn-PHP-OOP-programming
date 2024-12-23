<?php
// hashing first data
$sensitiveData = "Johnbosco";

// generate the randomsalt
$salt = bin2hex(random_bytes(16));

$pepper = "ASecretPepperString";

echo "<br>" . $salt;

$dataTohash = $sensitiveData . $salt . $pepper;

// hashing and hashing algorithm to be used
$hash = hash("sha256", $dataTohash);

echo "<br>" . $hash;



// hashing new data
$sensitiveData = "Johnbosco";

$storedSalt = $salt;
$storedHash = $hash;
$pepper = "ASecretPepperString";

$verificationHash = $sensitiveData . $storedSalt . $pepper;


// comparing the two hashes,the first and the new hash
if ($storedHash === $verificationHash){
    echo "The data are the same";

} else{
    echo "The data are not the same";

}