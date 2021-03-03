<?php
namespace Demo\Encrypt;

abstract class Cipher
{
	public $plain = '';
	public $cipher = '';
	public $salt = '';
	public $key = '';
	public function __construct(string $plain)
	{
		$this->key    = base64_encode(random_bytes(16));
		$this->salt   = base64_encode(random_bytes(16));
		$this->cipher = $this->encrypt($plain);
	}
	public abstract function encrypt(string $plain) : string;
}
