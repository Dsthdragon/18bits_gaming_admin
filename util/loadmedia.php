<?php
class loadmedia {

	static function image($id, $type)
	{
		return ADMIN_URL."sendImage/".$id."/".$type; 
	}

	static function youtubeThumb($id)
	{
		return "https://img.youtube.com/vi/".$id."/0.jpg";
	}

	static function youtubeEmbed($id)
	{
		return "https://www.youtube.com/embed/".$id;
	}
}