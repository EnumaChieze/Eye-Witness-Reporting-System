
<?php
/**
 * Note that the salt here is randomly generated.
 * Never use a static salt or one that is not randomly generated.
 *
 * For the VAST majority of use-cases, let password_hash generate the salt randomly for you
 */
$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$here = '0000';
$thepass = password_hash($mozhay, PASSWORD_BCRYPT, $options);
echo  $thepass;
?>
