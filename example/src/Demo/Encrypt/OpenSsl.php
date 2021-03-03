<?php
namespace Demo\Encrypt;

class OpenSsl extends Cipher
{
	public $tag = '';	// used by modes that provide message authentication
	public function encrypt(string $plain) : string
	{
		return openssl_encrypt($plain, 
							   'aes-256-gcm', 
							   $this->key, 
							   0,
							   $this->salt,
							   $this->tag);
	}
}
