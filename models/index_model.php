<?php 

class index_model extends model
{
	function __construct()
	{
		parent::__construct();
	}
	
    // Index Page STart HERE
    
    function tableCount($table)
    {
      $sth = $this->db->prepare("SELECT * FROM {$table}");
      $sth->execute();
      return $sth->rowCount();
    } 
    
    //  INDEX PAGE ENDS HERE

	function login(){
		$sth = $this->db->prepare("SELECT * FROM admin WHERE (email = :user OR username = :user) AND password = :pass");
		$sth->execute(array(":user" => $_POST['username'], ':pass' => hash::create("sha256", $_POST['password'], HASH_PASSWORD_KEY)));
		$data = $sth->fetch();
		if ($sth->rowCount() > 0) {
			session::init();
			session::set('uid', $data['id']);
			session::set('fullname', $data['fullname']);
			session::set('email', $data['email']);
			session::set('role', $data['role']);
			session::set('loggedIn', true);
			session::set('admin', true);
			header("location:". URL);
		} else {
			return array("Invalid username/password!");
		}
	}


	// Media Area Begin Here

	public function sendImage($id, $type)
	{
		if($type != "avatar"){
			if($id != null){
				$sth = $this->db->prepare("SELECT * FROM image WHERE id = :id");
				$sth->execute(array(":id" => $id));
				$data = $sth->fetch();
			} else {
				$sth = $this->db->prepare("SELECT * FROM image ORDER BY RAND() LIMIT 1");
				$sth->execute(array());
				$data = $sth->fetch();
			}
			if($type == "img") {
				$image = ROOT ."/". $data['url'];
			}else{
				$image = ROOT ."/". $data['thumb'];
			}
			header('Content-Type:'. image_type_to_mime_type(exif_imagetype($image)));
			header('Content-Length: '.filesize($image));
			readfile($image);
		} else {
			$this->getAvater($id);
		}
	}

	public function getAvater($id)
	{
		$admin = $this->getProfile($id);
		if (!empty($admin['img']) && file_exists(ROOT . '/' . $admin['img'])) {
			$image = ROOT ."/". $admin['img'];
			header('Content-Type: '. image_type_to_mime_type(exif_imagetype($image)));
			header('Content-Length: '.filesize($image));
			readfile($image);
		} else {
			$image = URL. 'public/img/avatar.svg';
			header('Content-Type:  image/svg+xml');
			readfile($image);
		}
	}

	public function getProfile($id)
	{
		$sth = $this->db->prepare("SELECT a.*, r.role as role_title FROM admin a LEFT JOIN role r ON r.id = a.role WHERE a.id = :id");
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}


	public function changePassword(){
		$error = array();
		foreach($_POST as $key)
		{
			if($key == null){
				$error[] = "All field required!";
				break;
			}
		}

		$profile = $this->getProfile($_SESSION['uid']);
		if(validator::confirmation($profile['password'], hash::create("sha256", $_POST['password'], HASH_PASSWORD_KEY)) == false){
			$error[] = "Invalid password inputted!";
		}
		if(validator::password($_POST['password1'], 6) == false){
			$error[] = "Password must be at least 6 characters long";
		}
		if(validator::confirmation($_POST['password'], $_POST['password1']) == true){
			$error[] = "New Password must be different from current password";
		}
		if(validator::confirmation($_POST['password1'], $_POST['password2']) == false){
			$error[] = "Password Confirmation failed";
		}
		if(empty($error)){
			$data = array();
			$data['password'] = hash::create("sha256", $_POST['password1'], HASH_PASSWORD_KEY);
			$this->db->update("admin", $data, "id = {$_SESSION['uid']}");
			return "Password Change Successful!";
		} else {
			return $error;
		}
	}

	public function uploadAvater()
	{
		$profile = $this->getProfile($_SESSION['uid']);

		if(!empty($profile['img']))
		{
			if (file_exists(ROOT . "/" . $profile['img'])) {
				unlink(ROOT . "/" . $profile['img']);
			}
		}

		$ext = explode('.',$_FILES['img']['name']);
		$ext = end($ext);
		$ext = strtolower($ext);
		$file = generato::random(20);
		$image = "public/upload/profile/".$file.'.'.$ext;

		copy($_FILES['img']['tmp_name'], $image);


		$resize = new resize($image);
		$resize->resizeImage(150, 150, 'crop');
		$resize->saveImage($image, 100);


		$data = array();
		$data['img'] = $image;

		$this->db->update("admin", $data, "id = {$profile['id']}");
		return "Profile Image Updated";

	}

	// Media Area Ends Here

	// General Area Begins Here

	function addImageBulk()
	{
		$error = 0;
		if(count($_FILES['file_param']['name']) > 0){
			foreach($_FILES['file_param']['name'] as $key => $value) {
				$ext = explode('.',$_FILES['file_param']['name'][$key]);
				$ext = end($ext);
				$ext = strtolower($ext);
				$file = generato::random(20);
				$image = "public/media/image/".$file.'.'.$ext;
				$thumb = "public/media/image/thumb/".$file.'.'.$ext;

				if(copy($_FILES['file_param']['tmp_name'][$key], $image)){

					$resize = new resize($image);
					$resize->resizeImage(480, 600, 'crop');
					$resize->saveImage($thumb, 100);

					$data = array();
					$data['url'] = $image;
					$data['thumb'] = $thumb;
					$this->db->insert("image", $data);
				} else {
					$error++;
				}
			}
			if($error == 0)
			{
				return "All files uploaded!";
			} else {
				$total = count($_FILES['file_param']['name']);
				return array(($total - $error)." of " .$total. " uploaded!");
			}
		} else {
			return array("No files selected");
		}
	}

	function generalImages()
	{
		if(!empty($_POST['images']))
		{
			if($_POST['action'] == "makeBanner")
			{
				if(count($_POST['images']) == 1)
				{
					$id = $_POST['images'][0];
					$data = array();
					$data['banner'] = $id;
					$data['updated_by'] = $_SESSION['uid'];
					$this->db->update("config", $data, " 1 + 1");
					return "Site Banner updated!";
				} else {
					return array("Only one image can become the banner");
				}
			} else if($_POST['action'] == "delete")
			{
				foreach($_POST['images'] as $value)
				{
					$this->db->delete("image", "id = {$value}");
				}
				return "Selected images removed from game!";
			} else if($_POST['action'] == "save")
			{
				foreach($_POST['images'] as $key => $value )
				{
					$this->db->update("image", array('title' => $_POST['titles'][$key]), "id = {$value}");
				}
			}
		} else {
			return array("Select image(s) to update");
		}
	}


	function generalVideos()
	{
		if(!empty($_POST['videos']))
		{
			if($_POST['action'] == "makeBannerVideo")
			{
				if(count($_POST['videos']) == 1)
				{
					$id = $_POST['videos'][0];
					$data = array();
					$data['bannerVideo'] = $id;
					$data['updated_by'] = $_SESSION['uid'];
					$this->db->update("config", $data, " 1 + 1");
					return "Site Video Banner updated!";
				} else {
					return array("Only one image can become the banner");
				}
			} else if($_POST['action'] == "delete")
			{
				foreach($_POST['videos'] as $value)
				{
					$this->db->delete("video", "id = {$value}");
				}
				return "Selected Videos removed from game!";
			}
		} else {
			return array("Select Video(s) to update");
		}
	}
	function getVideos()
	{
		return $this->db->select("SELECT * FROM video ORDER BY created_at DESC");
	}

	// General Area Ends Here

	//Games Area Begin Here

	public function getGenres()
	{
		return $this->db->select("SELECT g.*, COUNT(gg.id) as games FROM genre g LEFT JOIN game_genre gg on gg.genre = g.id GROUP BY g.id");
	}

	public function deleteGenre()
	{
		$sth = $this->db->prepare("SELECT * FROM genre WHERE id = :id");
		$sth->execute(array(":id" => $_POST['id']));
		if($sth->rowCount() > 0 )
		{
			$this->db->delete("genre", "id = {$_POST['id']}");
			return "Genre Deleted!";
		} else {
			return array("Genre not found!");
		}
	}

	public function new_game()
	{
		$error = array();

		if(empty($error)){
			$data = array();
			$data['title'] = "New Game";
			$data['link'] = "game".generater::digit(rand(3,6));
			$data['description'] = "No Description";

			$this->db->insert('game', $data);
			$id =  $this->db->lastInsertId();
			header('location:'.URL.'game/'.$id);
		} else {
			return $error;
		}
	}


	public function getGame($id)
	{
		$sth = $this->db->prepare("SELECT g.*, gi.image, i.url as img FROM game g LEFT JOIN game_image gi ON gi.game = g.id AND gi.main = 1 LEFT JOIN image i ON i.id =gi.image WHERE g.id = :id");
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}

	public function getGamePlatform($game)
	{
		return $this->db->select("SELECT gp.*, p.logo, p.title as platform_title, s.title as status_title  FROM game_platform gp LEFT JOIN platform p ON p.id = gp.platform LEFT JOIN status s ON s.id = gp.status WHERE gp.game = :game", array(':game' => $game));
	}

	public function getAvailablePlatforms($game)
	{
		return $this->db->select("SELECT * FROM platform WHERE id NOT IN (SELECT platform FROM game_platform WHERE game = :game) ORDER BY created_at DESC", array(':game' => $game));
	}

	public function getStatus()
	{
		return $this->db->select("SELECT * FROM status");
	}

	public function getGameStores($game)
	{
		return $this->db->select("SELECT gs.*, s.logo, s.title as store_title FROM game_store gs LEFT JOIN store s ON s.id = gs.store WHERE gs.game = :game", array(':game' => $game));
	}

	public function updateGamePlaform($id)
	{
		if(!empty($_POST['platforms']))
		{
			foreach($_POST['platforms'] as $value)
			{
				if($_POST['action'] == "update")
				{
					$data = array();
					$data['status'] = $_POST['status'][$value];
					$data['release_date'] = $_POST['release_date'][$value];

					$this->db->update("game_platform", $data, "id = {$value}");
				} else if($_POST['action'] == "delete") {
					$this->db->delete("game_platform", " id = {$value}");
				}
			}
			return "Update Made!";
		} else {
			return array("Select platforms to update");
		}
	}

	public function addGameGenre($game)
	{
		if(trim($_POST['genres']) != null){
			$genres = explode(',', $_POST['genres']);
			$done = 0;
			foreach ($genres as $key => $value) {
				if(trim($value) != null) {
					$sth = $this->db->prepare("SELECT * FROM genre WHERE title = :title");
					$sth->execute(array(':title' => trim($value)));
					if($sth->rowCount() > 0 )
					{
						$data = $sth->fetch();
						$st = $this->db->prepare("SELECT * FROM game_genre WHERE game = :game AND genre = :genre");
						$st->execute(array(':game' => $game, ':genre' => $data['id']));
						if($st->rowCount() == 0)
						{
							$id = $data['id'];
						}
					} else {
						$data = array();
						$data['title'] = ucfirst(trim($value));
						$data['link'] = urlencoder::slug(trim($value))."_".generater::digit(rand(3,6));
						$this->db->insert("genre", $data);
						$id = $this->db->lastInsertId();
					}
					if(isset($id)){
						$data = array();
						$data['game'] = $game;
						$data['genre'] = $id;
						$this->db->insert("game_genre", $data);
						$done++;
					}
				}
			}
			if($done == 0) {
				return array("No genre added to game");
			} else if($done != count($genres)) {
				return $done . " of " . count($genres) . " added!";
			} else {
				return "All genre added";
			}
		} else {
			return array("Enter genres to be added");
		}
	}

	public function getGameGenre($game)
	{
		return $this->db->select("SELECT gg.*, g.title as genre_title FROM game_genre gg LEFT JOIN genre g  ON g.id = gg.genre WHERE gg.game = :game", array(':game' => $game));
	}

	public function updateGameGenre($game)
	{
		if(!empty($_POST['genres']))
		{
			foreach($_POST['genres'] as $value)
			{
				$this->db->delete("game_genre", " id = {$value}");
			}
			return "Update made";
		} else {
			return array("Select genres to update");
		}
	}

	public function updateGameStore($game)
	{
		if(!empty($_POST['stores']))
		{
			foreach($_POST['stores'] as $value)
			{
				$this->db->delete("game_store", " id = {$value}");
			}
			return "Update made";
		} else {
			return array("Select stores to update");
		}
	}

	public function availableStores($game) 
	{
		return $this->db->select("SELECT * FROM store WHERE id NOT IN (SELECT store FROM game_store WHERE game = :game) ORDER BY created_at DESC", array(':game' => $game));
	}

	public function addGameStore($game)
	{
		$sth = $this->db->prepare("SELECT * FROM game_store WHERE game = :game AND store = :store");
		$sth->execute(array(":game" => $game, ":store" => $_POST['store']));
		if($sth->rowCount() > 0)
		{
			return array("Store already added to game");
		} else {
			$data = array();
			$data['store'] = $_POST['store'];
			$data['game'] = $game;
			$data['url'] = $_POST['url'];
			$this->db->insert("game_store", $data);
			return "Store added to game";
		}
	}

	public function addGamePlatform($game)
	{
		$sth = $this->db->prepare("SELECT * FROM game_platform WHERE game = :game AND platform = :platform");
		$sth->execute(array(":game" => $game, ":platform" => $_POST['platform']));
		if($sth->rowCount() > 0)
		{
			return array("Platform already added to game");
		} else {
			$data = array();
			$data['platform'] = $_POST['platform'];
			$data['game'] = $game;
			$data['status'] = $_POST['status'];
			$data['release_date'] = $_POST['release_date'];
			$this->db->insert("game_platform", $data);
			return "Platform added to game";
		}
	}

	public function getGameImages($id)
	{
		return $this->db->select("SELECT gi.id as gid, gi.main, i.* FROM game_image gi LEFT JOIN image i ON i.id = gi.image WHERE gi.game = :game", array(':game' => $id));
	}

	public function generalGameImage($game)
	{
		if(!empty($_POST['images']))
		{
			if($_POST['action'] == "makeMain")
			{
				if(count($_POST['images']) == 1)
				{
					$id = $_POST['images'][0];
					$this->db->update("game_image", array("main" => 0), "game = {$game}");
					$this->db->update("game_image", array("main" => 1), "id = {$id}");
					return "Game Main updated!";
				} else {
					return array("Only one image can become the main image");
				}
			} else if($_POST['action'] == "delete")
			{
				foreach($_POST['images'] as $value)
				{
					$this->db->delete("game_image", "id = {$value}");
				}
				return "Selected images removed from game!";
			}
		} else {
			return array("Select image(s) to update");
		}
	}


	public function addImageForm($game){
		$ext = explode('.',$_FILES['file_param']['name']);
		$ext = end($ext);
		$ext = strtolower($ext);
		$file = generato::random(20);
		$image = "public/media/image/".$file.'.'.$ext;
		$thumb = "public/media/image/thumb/".$file.'.'.$ext;

		if(copy($_FILES['file_param']['tmp_name'], $image)){

			$resize = new resize($image);
			$resize->resizeImage(200, 200, 'crop');
			$resize->saveImage($thumb, 100);

			$data = array();
			$data['url'] = $image;
			$data['thumb'] = $thumb;
			$this->db->insert("image", $data);

			$id = $this->db->lastInsertId();
			$data = array();
			$data['game'] = $game;
			$data['image'] = $id;
			$this->db->insert("game_image", $data);
			return "Image Uploaded";
		} else {
			return array("Something Went Wrong file not upload");
		}
	}

	public function availableImages($game) {
		return $this->db->select("SELECT * FROM image WHERE id NOT IN (SELECT image FROM game_image WHERE game = :game) ORDER BY created_at DESC", array(':game' => $game));
	}

	public function updateGame($id){
		foreach ($_POST as $key => $value) {
			if($value == null){
				$error[] = "All fields are required!";
				break;
			}
		}

		if(empty($error)){
			$data = array();
			$data['title'] = $_POST['title'];
			if(isset($_POST['changeLink'])){
				$data['link'] = urlencoder::slug($_POST['title'])."_".generater::digit(rand(3,6));
			}
			$data['description'] = $_POST['description'];
			$this->db->update('game', $data, "id = {$id}");
			return "Game Updated!";
		} else {
			return $error;
		}
	}

	public function publishGame(){

		$sth = $this->db->prepare("SELECT * FROM game WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$data =  $sth->fetch();
			if($data['published'] == 0)
			{
				$this->db->update("game", array('published' => 1), "id ={$_POST['id']}");
				return "Game Published";
			} else {
				$this->db->update("game", array('published' => 0), "id ={$_POST['id']}");
				return "Game reverted to draft";
			}
		} else {
			return array('Game not found!');
		}
	}

	public function getGames($type = null)
	{
		if($type == "published")
			return $this->db->select("SELECT * FROM game WHERE published = 1");
		else if($type == "draft")
			return $this->db->select("SELECT * FROM game WHERE published = 0");
		else
			return $this->db->select("SELECT * FROM game");
	}


	public function editAllGames()
	{
		if(empty($_POST['games'])){
			return array("Select games to ".$_POST['action']);
		}
		if($_POST['action'] == "publish"){
			foreach($_POST['games'] as $key => $value)
			{
				$this->db->update("game", array('published' => 1), "id ={$value}");
			}
			return "All selected games published";
		} else if($_POST['action'] == "draft")
		{
			foreach($_POST['games'] as $key => $value)
			{
				$this->db->update("game", array('published' => 0), "id ={$value}");
			}
			return "All selected games reverted to draft";
		} else if($_POST['action'] == "delete")
		{
			foreach($_POST['games'] as $key => $value)
			{
				$this->db->delete("game", "id ={$value}");
			}
			return "All selected games deleted";
		}
	}

	public function deleteGame()
	{
		$sth = $this->db->prepare("SELECT * FROM game WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$this->db->delete("game", "id ={$_POST['id']}");
			return "Game deleted!";
		}else{
			return array("Game not found!");
		}
	}

	public function setGameImage($game)
	{
		$image = $_GET['id'];
		$this->db->update("game_image", array("main" => 0), "game = {$game}");
		$sth = $this->db->prepare("SELECT * FROM game_image WHERE game = :game AND image = :image");
		$sth->execute(array(':game' => $game, ':image' => $image));
		if($sth->rowCount() > 0)
		{
			$this->db->update("game_image", array("main" => 1), "game = {$game} AND image = {$image}");
			echo 1;
		} else {
			$data = array();
			$data['game'] = $game;
			$data['image'] = $image;
			$data['main'] = 1;
			$this->db->insert('game_image', $data);
		}
	}

	public function setGameGallery($game, $image)
	{
		$sth = $this->db->prepare("SELECT * FROM game_image WHERE game = :game AND image = :image");
		$sth->execute(array(':game' => $game, ':image' => $image));
		if($sth->rowCount() > 0)
		{
		} else {
			$data = array();
			$data['game'] = $game;
			$data['image'] = $image;
			$this->db->insert('game_image', $data);
		}
	}


	public function getPlatforms()
	{
		return $this->db->select("SELECT p.*, COUNT(gp.id) as games FROM platform p LEFT JOIN  game_platform gp ON gp.platform = p.id GROUP BY p.id");
	}

	public function deletePlatform()
	{
		$sth = $this->db->prepare("SELECT * FROM platform WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0) {
			$this->db->delete("platform", "id = {$_POST['id']}");
			return "Platform deleted!";
		} else {
			return array("Platform not found!");
		}
	}

	public function createPlatform()
	{
		$error = array();
		foreach($_POST as $key => $value){
			if($value == null){
				$error[] = "all fields are required!";
				break;
			}
		}

		$sth = $this->db->prepare("SELECT * FROM platform WHERE title = :title");
		$sth->execute(array(':title' => $_POST['title']));
		if($sth->rowCount() > 0){
			$error[] = "Platform already in system";
		}
		if(empty($error))
		{
			$data = array();
			$data['title'] = $_POST['title'];
			$data['link'] =urlencoder::slug($_POST['title'])."_".generater::digit(rand(3,6));
			$data['logo'] = $_POST['logo'];
			$this->db->insert('platform', $data);
			return "Platform created!";
		} else {
			return $error;
		}
	}

	public function getStores()
	{
		return $this->db->select("SELECT s.*, COUNT(gs.id) as games FROM store s LEFT JOIN  game_store gs ON gs.store = s.id GROUP BY s.id");
	}

	public function deleteStore()
	{
		$sth = $this->db->prepare("SELECT * FROM store WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0) {
			$this->db->delete("store", "id = {$_POST['id']}");
			return "Store deleted!";
		} else {
			return array("Store not found!");
		}
	}

	public function createStore()
	{
		$error = array();
		foreach($_POST as $key => $value){
			if($value == null){
				$error[] = "all fields are required!";
				break;
			}
		}

		$sth = $this->db->prepare("SELECT * FROM store WHERE title = :title");
		$sth->execute(array(':title' => $_POST['title']));
		if($sth->rowCount() > 0){
			$error[] = "Store already in system";
		}
		if(empty($error))
		{
			$data = array();
			$data['title'] = $_POST['title'];
			$data['logo'] = $_POST['logo'];
			$data['link'] = $_POST['link'];	
			$this->db->insert('store', $data);
			return "Store created!";
		} else {
			return $error;
		}
	}

	function getGameVideos($id)
	{
		return $this->db->select("SELECT gv.*, v.youtube_id, v.title FROM game_video gv LEFT JOIN video v ON v.id = gv.video WHERE gv.game = :game", array(':game' => $id));
	}

	public function generalGameVideo($game)
	{
		if(!empty($_POST['videos']))
		{
			if($_POST['action'] == "delete")
			{
				foreach($_POST['videos'] as $value)
				{
					$this->db->delete("game_video", "id = {$value}");
				}
				return "Selected video(s) removed from game!";
			}
		} else {
			return array("Select Video(s) to update");
		}
	}

	function addGameVideo($id = 0){
		$error = array();

		$regex_pattern = "/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/";
		if (preg_match($regex_pattern, $_POST['link'], $match)) {
			$youtube_id = explode('&',trim($match[4], 'v/'));
			$youtube_id = reset($youtube_id);
			$headers = get_headers('https://www.youtube.com/oembed?format=json&url=http://www.youtube.com/watch?v=' . $youtube_id);
			if((is_array($headers) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$headers[0]) : false) == false){
				$error[] = "Game Video not found!";
			} else {
				$sth = $this->db->prepare("SELECT * FROM video WHERE youtube_id = :youtube_id");
				$sth->execute(array(":youtube_id" => $youtube_id));

				if($sth->rowCount() && $id != 0){
					$video = $sth->fetch();
					$sth = $this->db->prepare("SELECT * FROM game_video WHERE game = :game AND video =:video");
					$sth->execute(array(':game' => $id, ":video" => $video['id']));
					if($sth->rowCount() > 0)
					{
						$error[] = "video already added to game";
					}
				} else if($sth->rowCount() && $id == 0) {
					$error[] = "video already";
				}
			}
		} else {
			$error[] = "Invalid valid youtube URL";
		}
		if(trim($_POST['title']) == null){
			$error[] = "Input video title";
		}
		if(empty($error))
		{
			if(empty($video))
			{
				$data = array();
				$data['title'] = $_POST['title'];
				$data['youtube_id'] = $youtube_id;
				$this->db->insert("video", $data);
				$video_id = $this->db->lastInsertId();
			} else {
				$video_id = $video['id'];
			}
			if($id != 0) {
				$data = array();
				$data['game'] = $id;
				$data['video'] = $video_id;
				$this->db->insert("game_video", $data);
			}
			return "Video uploaded";
		} else {
			return $error;
		}
	}

	//Games Area Ends Here

	// Blog Begins Here

	public function getCategories(){
		return $this->db->select("SELECT c.*, COALESCE(c1.title, 'NONE') as parent_name  FROM category c LEFT JOIN category c1 ON c1.id = c.parent");
	}

	public function addCategory(){
		if($_POST['title'] == null){
			$error[] = "Enter category title!";
		}
		$sth = $this->db->prepare("SELECT * FROM category WHERE title = :title");
		$sth->execute(array(':title' => $_POST['title']));
		if($sth->rowCount() > 0){
			$error[] = "Category already in system!";
		}

		if(empty($error)){
			$data = array();
			$data['title'] = $_POST['title'];
			$data['link'] = urlencoder::slug($_POST['title']);
			if($_POST['parent'] != null){
				$data['parent'] = $_POST['parent'];
			}
			$this->db->insert("category", $data);
			return "Category added!";
		} else {
			return $error;
		}
	}

	function deleteCategory(){
		$sth = $this->db->prepare("SELECT * FROM category WHERE id = :id");
		$sth->execute(array(":id" => $_POST['id']));
		if($sth->rowCount() > 0 )  {
			$this->db->delete("category", "id = {$_POST['id']}");
			return "Category deleted!";
		} else {
			return array("category not found!");
		}
	}

	public function getUsers(){
		return $this->db->select("SELECT a.*, r.role as role_name FROM admin a LEFT JOIN role r ON r.id = a.role");
	}

	public function addAdmin(){
		$error = array();
		foreach($_POST as $key => $value){
			if($value == null){
				$error[] = "all fields are required!";
				break;
			}
		}

		$sth = $this->db->prepare("SELECT * FROM admin WHERE email = :email");
		$sth->execute(array(':email' => $_POST['email']));
		if($sth->rowCount() > 0){
			$error[] = "Email already in system!";
		}
		if(empty($error)){
			$data = array();
			$data['username'] = $this->createUsername($_POST['fullname']);
			$data['email'] = $_POST['email'];
			$data['fullname'] = $_POST['fullname'];
			$data['password'] = hash::create("sha256", "123456", HASH_PASSWORD_KEY);
			$data['role'] = $_POST['role'];
			$data['link'] = urlencoder::slug($_POST['fullname']);
			$this->db->insert('admin', $data);
			return "Administrator created successfully!";
		} else {
			return $error;
		}
	}


	public function createUsername($fullname) {
		$username = str_replace(' ', '', $fullname);
		$username = substr($username, 0, rand(-2, -6));
		$username = strtolower($username);
		$sth = $this->db->prepare("SELECT * FROM admin WHERE username = :username");
		$sth->execute(array(':username' => $username));
		$sth->fetch();
		if($sth->rowCount() == 0) {
			return $username;
		}
		return $this->createUsername($fullname);
	}

	public function getRoles(){
		return $this->db->select("SELECT * FROM role");
	}

	public function getRole($id){
		$sth = $this->db->prepare("SELECT * FROM role WHERE id = :id");
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}

	public function addRole(){
		$error = array();
		foreach($_POST as $key => $value){
			if($value == null){
				$error[] = "All fields are required!";
				break;
			}
		}

		if(empty($error)){
			$data = array();
			$data['role'] = $_POST['role'];
			$data['description'] = $_POST['description'];
			$this->db->insert("role", $data);
			return "Role created successfully!";
		} else {
			return $error;
		}
	}

	public function deleteRole(){
		$sth = $this->db->prepare("SELECT * FROM role WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0){
			$this->db->delete("role", "id = {$_POST['id']}");
			return "Role deleted successfully!";
		} else {
			return array("Role not found!");
		}
	}

	public function deleteLink(){
		$sth = $this->db->prepare("SELECT * FROM link WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0){
			$this->db->delete("link", "id = {$_POST['id']}");
			return "link deleted successfully!";
		} else {
			return array("link not found!");
		}
	}

	public function getLinks(){
		return $this->db->select("SELECT * FROM link");
	}

	public function addLink(){
		$error = array();
		foreach($_POST as $key => $value){
			if($value == null){
				$error[] = "all fields are required!";
				break;
			}
		}

		$sth = $this->db->prepare("SELECT * FROM link WHERE link = :link");
		$sth->execute(array(':link' => $_POST['link']));
		if($sth->rowCount() > 0){
			$error[] = "link already in the system!";
		}

		if(empty($error)){
			$data = array();
			$data['link'] = $_POST['link'];
			$data['title'] = $_POST['title'];
			$data['group'] = $_POST['group'];
			$data['icon'] = $_POST['icon'];
			$data['linkName'] = $_POST['linkName'];
			if(isset($_POST['navbar'])){
				$data['navbar'] = 1;
			}
			$this->db->insert("link", $data);
			return "Link created successfully!";
		} else {
			return $error;
		}
	}

	function getLinkGroups(){
		return $this->db->select("SELECT lg.*, COUNT(l.id) as links FROM link_group lg LEFT JOIN link l on l.group = lg.id GROUP BY lg.id ORDER BY `group` ASC");
	}

	function createLinkGroup() {
		$error = array();
		$group = trim($_POST['group'], ' ');
		$group = ucfirst($group);
		if($group == null){
			$error[] = "Group name required!";
		}
		$sth = $this->db->prepare("SELECT * FROM link_group WHERE `title` = :title");
		$sth->execute(array(":title" => $group));
		if($sth->rowCOunt() > 0){
			$error[] = "Group Name already in system!";
		}
		if(trim($_POST['icon'], " ") == null){
			$error[] = "Enter Icon css Class";
		}
		if(empty($error)){
			$data = array();
			$data['title'] = $group;
			$data['icon'] = $_POST['icon'];
			$this->db->insert('link_group', $data);
			return "Link group Created";
		} else {
			return $error;
		}
	}

	function deleteLinkGroup(){
		$sth = $this->db->prepare("SELECT * FROM link_group WHERE id = :id");
		$sth->execute(array(":id" => $_POST['id']));
		if($sth->rowCount() > 0){
			$this->db->delete("link_group", "id = {$_POST['id']}");
			return "Link group deleted!";
		} else {
			return array("Link Group not Found!");
		}
	}

	public function getAccess($id) {
		$links = $this->db->select("SELECT link FROM access WHERE role = :role", array(':role' => $id));
		$newLinks = array();
		foreach($links as $key => $value) {
			$newLinks[] = $value['link'];
		}
		return $newLinks;
	}

	public function getAccessDetailed($id) {
		$sth = $this->db->prepare("SELECT a.*, l.link as dLink, l.title as dTitle FROM access a LEFT JOIN link l ON a.link = l.id WHERE a.role = :role");
		$sth->execute(array(':role' => $id));
		return $sth->fetchAll();
	}

	public function modifyAccess($id) {
		$done = 0;
		$total = count($_POST['id']);
		foreach($_POST['id'] as $key => $value){
			$sth = $this->db->prepare("SELECT * FROM access WHERE link = :link AND role = :role");
			$sth->execute(array(':link' => $value, ':role' => $id));
			if($sth->rowCount() == 0){
				$this->db->insert('access', array('role' => $id, 'link' => $value));
				$done++;
			}
		}

		if($done == $total) {
			return "All selected access added to role";
		} else if($done == 0) {
			return array("No new access added to role!");
		} else {
			return $done . " of " . $total .' added to role';
		}
	}

	public function addAllAccess($id) {
		$done = 0;
		$links = $this->getLinks();
		$total = count($links);
		foreach($links as $key => $value){
			$sth = $this->db->prepare("SELECT * FROM access WHERE link = :link AND role = :role");
			$sth->execute(array(':link' => $value['id'], ':role' => $id));
			if($sth->rowCount() == 0){
				$this->db->insert('access', array('role' => $id, 'link' => $value['id']));
				$done++;
			}
		}

		if($done == $total) {
			return "All access added to role";
		} else if($done == 0) {
			return array("No new access added to role!");
		} else {
			return $done . " of " . $total .' added to role';
		}
	}

	public function removeAllAccess($id) {

		$this->db->deleteAll("access", "role = {$id}");
		return "All access removed from role";
	}

	public function removeAccess($id) {
		$done = 0;
		$total = count($_POST['id']);
		foreach($_POST['id'] as $key => $value){
			$sth = $this->db->prepare("SELECT * FROM access WHERE link = :link AND role = :role");
			$sth->execute(array(':link' => $value, ':role' => $id));
			if($sth->rowCount() > 0){
				$access = $sth->fetch();
				$access_id = $access['id'];
				$this->db->delete('access', "id = {$access_id}");
				$done++;
			}
		}

		if($done == $total) {
			return "All selected access removed from  role";
		} else if($done == 0) {
			return array("No new access removed role!");
		} else {
			return $done . " of " . $total .' removed from role';
		}
	}

	public function fileupload(){
		$ext = explode('.',$_FILES['file_param']['name']);
		$ext = end($ext);
		$ext = strtolower($ext);
		$file = generato::random(20);
		if($_POST['type'] == "file"){
			$image = "public/media/file/".$file.'.'.$ext;
		}else if($_POST['type'] == "image"){
			$image = "public/media/image/".$file.'.'.$ext;
			$thumb = "public/media/image/thumb/".$file.'.'.$ext;
		} else if($_POST['type'] == "video"){
			$image = "public/media/video/".$file.'.'.$ext;
		}
		if(copy($_FILES['file_param']['tmp_name'], $image)){

			if($_POST['type'] == "image"){
				$resize = new resize($image);
				$resize->resizeImage(480, 600, 'crop');
				$resize->saveImage($thumb, 100);

				$data = array();
				$data['url'] = $image;
				$data['thumb'] = $thumb;
				$this->db->insert("image", $data);
			} else {
				$data = array();

				$data['url'] = $image;
				$data['type'] = $_POST['type'];
				$this->db->insert("file", $data);
			}
			if(isset($_POST['custom'])){
				$id = $this->db->lastInsertId();
				echo json_encode(array('status' => 'success' ,'id' => $id, 'message' => "Upload was successful"));
			} else {
				echo json_encode(array('location' => URL.$image));
			}
		} else {

			if(isset($_POST['custom'])){
				echo json_encode(array('status' => 'error' ,'message' => "Something Went Wrong file not upload"));
			}
		}
	}

	public function deleteFile($id = 0){
		$sth = $this->db->prepare("SELECT * FROM image WHERE id = :id");
		$sth->execute(array(':id' => $_GET['id']));
		if($sth->rowCount() > 0){
			$data = $sth->fetch();

			if(!empty($data['url'])){
				if (file_exists(ROOT . "/" . $data['url'])) {
					unlink(ROOT . "/" . $data['url']);
				}
			}
			if(!empty($data['thumb'])){
				if (file_exists(ROOT . "/" . $data['thumb'])) {
					unlink(ROOT . "/" . $data['thumb']);
				}
			}
			$this->db->delete("image", "id = {$_GET['id']}");
		}
	}

	public function imageManager(){
		$data = array();
		$_data = $this->db->select("SELECT * FROM image ORDER BY created_at DESC");
		foreach($_data as $key => $value){
			$pop = array();
			$pop['id'] = $value['id'];
			$pop['title'] = $value['title'];
			$pop['url'] = URL.$value['url'];
			$pop['thumb'] = URL.$value['thumb'];
			$pop['created_at'] = URL.$value['created_at'];
			$data[] = $pop;
		}
		return $data;
	}

	public function imageManager2(){
		$data = array();
		$_data = $this->db->select("SELECT * FROM image ORDER BY created_at DESC");
		foreach($_data as $key => $value){
			$pop = array();
			$pop['title'] = "<img src='". URL. $value['url']."' />";
			$pop['value'] = $value['url'];
			$data[] = $pop;
		}
		return $data;
	}

	public function getArticle($id){
		$sth = $this->db->prepare("SELECT p.*, c.title as category_title, a.fullname, i.url as img FROM post p LEFT JOIN category c ON c.id = p.category LEFT JOIN admin a ON a.id = p.admin LEFT JOIN image i ON i.id = p.image WHERE p.id = :id");
		$sth->execute(array(':id' => $id));
		return $sth->fetch();
	}

	public function newArticle(){
		$error = array();

		if(empty($error)){
			$data = array();
			$data['admin'] = $_SESSION['uid'];
			$data['title'] = "New Post";
			$data['link'] = "draft_".generater::digit(rand(3,6));
			$data['post'] = "New Post";
			$data['abstract'] = "New Abstract";

			$this->db->insert('post', $data);
			$id =  $this->db->lastInsertId();
			header('location:'.URL.'article/'.$id);
		} else {
			return $error;
		}
	}

	public function setArticleImage($id)
	{
		$data = array("image" => $_GET['id']);
		$this->db->update("post", $data, "id = {$id}");
	}

	public function updatePost($id){
		foreach ($_POST as $key => $value) {
			if($value == null){
				$error[] = "All fields are required!";
				break;
			}
		}

		if(empty($error)){
			$data = array();
			$data['category'] = $_POST['category'];
			$data['title'] = $_POST['title'];
			if(isset($_POST['changeLink'])){
				$data['link'] = urlencoder::slug($_POST['title'])."_".generater::digit(rand(3,6));
			}
			$data['post'] = $_POST['post'];
			$data['abstract'] = $_POST['abstract'];
			if(isset($_POST['top'])){
				$data['top'] = 1;
			} else {
				$data['top'] = 0;
			}
			$this->db->update('post', $data, "id = {$id}");
			return "Post Updated!";
		} else {
			return $error;
		}
	}

	public function publishArticle(){

		$sth = $this->db->prepare("SELECT * FROM post WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$data =  $sth->fetch();
			if($data['published'] == 0)
			{
				$this->db->update("post", array('published' => 1), "id ={$_POST['id']}");
				return "Article Published";
			} else {
				$this->db->update("post", array('published' => 0), "id ={$_POST['id']}");
				return "Article reverted to draft";
			}
		} else {
			return array('Article not found!');
		}
	}

	public function getArticles($type = null)
	{
		if($type == "published")
			return $this->db->select("SELECT p.*, c.title as category_title, a.fullname FROM post p LEFT JOIN admin a ON a.id = p.admin LEFT JOIN category c ON c.id = p.category WHERE p.published = 1 ORDER BY p.created_at DESC");
		else if($type == "draft")
			return $this->db->select("SELECT p.*, c.title as category_title, a.fullname FROM post p LEFT JOIN admin a ON a.id = p.admin LEFT JOIN category c ON c.id = p.category  WHERE p.published = 0 ORDER BY p.created_at DESC");
		else if($type == "top")
			return $this->db->select("SELECT p.*, c.title as category_title, a.fullname FROM post p LEFT JOIN admin a ON a.id = p.admin LEFT JOIN category c ON c.id = p.category  WHERE p.top = 1  ORDER BY p.created_at DESC");
		else
			return $this->db->select("SELECT p.*, c.title as category_title, a.fullname FROM post p LEFT JOIN admin a ON a.id = p.admin LEFT JOIN category c ON c.id = p.category  ORDER BY p.created_at DESC");
	}


	public function editAll()
	{
		if(empty($_POST['articles'])){
			return array("Select articles to ".$_POST['action']);
		}
		if($_POST['action'] == "publish"){
			foreach($_POST['articles'] as $key => $value)
			{
				$this->db->update("post", array('published' => 1), "id ={$value}");
			}
			return "All selected articles published";
		} else if($_POST['action'] == "draft")
		{
			foreach($_POST['articles'] as $key => $value)
			{
				$this->db->update("post", array('published' => 0), "id ={$value}");
			}
			return "All selected articles reverted to draft";
		} else if($_POST['action'] == "delete")
		{
			foreach($_POST['articles'] as $key => $value)
			{
				$this->db->delete("post", "id ={$value}");
			}
			return "All selected articles deleted";
		}
	}

	public function deleteArticle()
	{
		$sth = $this->db->prepare("SELECT * FROM post WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0)
		{
			$this->db->delete("post", "id ={$_POST['id']}");
			return "Article deleted!";
		}else{
			return array("Article not found!");
		}
	}

	public function getTags(){
		if(isset($_GET['tag'])){
			return $this->db->select("SELECT * FROM tag WHERE tag LIKE %:tag%", array(':tag' => $_GET['tag']));
		} else {
			return $this->db->select("SELECT * FROM tag");
		}
	}

	public function getTagsAjax($post){
		//return $this->db->select("SELECT * FROM tag WHERE id IN (SELECT tag FROM post_tag WHERE post = {$post}) ");
		return $this->db->select("SELECT pt.*, t.tag as tag_name FROM post_tag pt LEFT JOIN tag t on pt.tag = t.id WHERE pt.post = {$post} ");
	}

	public function checkTags($post){
		return $this->db->select("SELECT * FROM tag WHERE tag LIKE '%{$_POST['tag']}%' AND id NOT IN (SELECT tag FROM post_tag WHERE post = {$post}) ");
	}



	public function deleteTag(){
		$sth = $this->db->prepare("SELECT * FROM tag WHERE id = :id");
		$sth->execute(array(':id' => $_POST['id']));
		if($sth->rowCount() > 0){
			$this->db->delete("tag", "id = {$_POST['id']}");
			return "tag deleted successfully!";
		} else {
			return array("tag not found!");
		}
	}

	public function deletePostTags($id){
		$sth = $this->db->prepare("SELECT * FROM post_tag WHERE id = :id");
		$sth->execute(array(':id' => $id));
		if($sth->rowCount() > 0){
			$this->db->delete('post_tag', "id = {$id}");
			echo "Tag delete from post!";
			return;
		} else {
			echo $id;
			echo "Tag not Found!";
			return;
		}
	}

	public function addTag($post){
		if(isset($_POST['tag'])){
			$data = array();
			$data['post'] = $post;
			$tag = ucwords($_POST['tag']);
			$sth = $this->db->prepare("SELECT * FROM tag WHERE tag = :tag");
			$sth->execute(array(':tag' => $tag));
			if($sth->rowCount() > 0){
				$_data = $sth->fetch();
				$data['tag'] = $_data['id'];
			} else {

				$this->db->insert('tag', array('tag' => $tag, "link" => urlencoder::slug($tag)."_".generater::digit(rand(3,6))));
				$id = $this->db->lastInsertId();
				$data['tag'] = $id;

			}

			$sth = $this->db->prepare("SELECT * FROM post_tag WHERE tag = :tag AND post = :post");
			$sth->execute(array(':tag' => $data['tag'], ":post" => $data['post']));
			if($sth->rowCount() == 0){
				$this->db->insert('post_tag', $data);
				echo "Tag added to post!";
				return;
			}
			echo "Tag added already added to post!";
			return;
		} else {
			echo "Input a Tag";
			return;
		}
	}
 	// Blog ends here
}
