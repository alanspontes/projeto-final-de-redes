<?php

class Planet extends \HXPHP\System\Model
{
	public static function votar($user_id, array $post)
	{
		$callbackObj = new \stdClass;
		$callbackObj->status = true;
		
		$user = self::find_by_user_id($user_id);

		if(is_null($user))
		{

			$post = array_merge($post, $user_id);
			$colunacriada = self::create($post);
			return $callbackObj;
			
		}
		else
		{
			$callbackObj->status = false;
			return $callbackObj;
		}
	}
}