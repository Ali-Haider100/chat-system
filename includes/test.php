<?php
    $string = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, unde" ;
    $cipher = "AES-128-CTR";
    $opt = 0;
    $iv = "1234567891011121";
    $key = "chat";
    $encryption = openssl_encrypt($string, $cipher, $key, $opt, $iv);
    echo $encryption ;
    echo "<br>";
    $new = "w2TBpf08ji3wrrDXldqziA6bqvfyWJpP+Pb33tkL2QYImPVZLzaFloj5iUCRqdAOW1kJkrymWGlz9qT4LRyudlA7lvYeUQ==";
    $decryption = openssl_decrypt($new, $cipher, $key, $opt, $iv);
    echo $decryption;
  ?>