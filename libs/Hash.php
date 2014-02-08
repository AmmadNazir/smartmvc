<?php

class Hash 
{
    /**
     * 
     * @param String $algo the algorithm (md5, sha1 , whirlpool, etc)
     * @param String $data $the data to encode
     * @param String $salt (this should be the same throughtout the system probably) 
     * @return String the hashed/salted data
     */
    public static function create($algo, $data, $salt)
    {
       $context = hash_init($algo, HASH_HMAC, $salt);
       hash_update($context, $data);
       
       return hash_final($context);
    }
}
