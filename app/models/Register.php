<?php

class Register extends \HXPHP\System\Model
{
	public static function enviar($post)
	{
		return self::create($post);
	}
}