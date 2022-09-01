<?php

class index extends controller
{
    function __construct()
    {
        parent::__construct();
        @session_start();
        $this->view->js = array("blog/extra/js/default.js");
    }

    function __call($method,$argument){

        $except = array("sendImage", "checkLog", "error");
        if(!in_array($method, $except)){
            $this->checkLog();
            return call_user_func_array(array($this, $method), $argument);
        } else {
            return call_user_func_array(array($this, $method), $argument);
        }
    }

    private function index()
    {
        //$this->checkLog();
        
        $this->view->videos = $this->model->tableCount("video");
        $this->view->images = $this->model->tableCount("image");
        $this->view->games = $this->model->tableCount("game");
        $this->view->admins = $this->model->tableCount("admin");
        $this->view->categories = $this->model->tableCount("category");
        $this->view->files = $this->model->tableCount("file");
        $this->view->genres = $this->model->tableCount("genre");
        $this->view->links = $this->model->tableCount("link");
        $this->view->platforms = $this->model->tableCount("platform");
        $this->view->articles = $this->model->tableCount("post");
        $this->view->roles = $this->model->tableCount("role");
        $this->view->stores = $this->model->tableCount("store");
        $this->view->tags = $this->model->tableCount("tag");
        
        $this->view->activePage = "index";
        $this->view->content = "index/index";
        $this->view->render('body');
    }

    private function login()
    {
        if(isset($_POST['form'])){
            if($_POST['form'] == "loginForm"){
                $this->view->output = $this->model->login();
            }
        }
        $this->view->activePage = "category";
        $this->view->render('general/login');
    }


    // General Area Begin Here


    private function profile()
    {
        if(isset($_POST['form'])) {
            if ($_POST['form'] == 'changePassword') {
                $this->view->output = $this->model->changePassword();
            } else if ($_POST['form'] == 'uploadProfileImg') {
                $this->view->output = $this->model->uploadAvater();
            }
        }
        $this->view->profile = $this->model->getProfile($_SESSION['uid']);
        $this->view->activePage = "profile";
        $this->view->content = "general/profile";
        $this->view->render('body');
    }


    private function images($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "generalImages"){
                $this->view->output = $this->model->generalImages();
            } else if($_POST['form'] == "addImageForm"){
                $this->view->output = $this->model->addImageBulk();
            }
        }

        $this->view->activePage = "images";
        $this->view->images = $this->model->imageManager();

        $this->view->content = "general/images";
        $this->view->render('body');
    }

    private function videos($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "generalVideos"){
                $this->view->output = $this->model->generalVideos();
            } else if ($_POST['form'] == "addVideo") {
                $this->view->output = $this->model->addGameVideo();
            }
        }

        $this->view->activePage = "videos";
        $this->view->videos = $this->model->getVideos();

        $this->view->content = "general/videos";
        $this->view->render('body');

    }

    // General Area Ends Here

    //Games Area Begin Here

    private function genre ($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "deleteGenre"){
                $this->view->output = $this->model->deleteGenre();
            }
        }

        $this->view->activePage = "genre";
        $this->view->genres = $this->model->getGenres();

        $this->view->content = "games/genre";
        $this->view->render('body');
    }

    function platform($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "createPlatform"){
                $this->view->output = $this->model->createPlatform();
            } else if($_POST['form'] == "deletePlatform"){
                $this->view->output = $this->model->deletePlatform();
            }
        }

        $this->view->activePage = "platform";
        $this->view->platforms = $this->model->getPlatforms();

        $this->view->content = "games/platform";
        $this->view->render('body');
    }

    function store($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "createStore"){
                $this->view->output = $this->model->createStore();
            } else if($_POST['form'] == "deleteStore"){
                $this->view->output = $this->model->deleteStore();
            }
        }

        $this->view->activePage = "store";
        $this->view->stores = $this->model->getStores();

        $this->view->content = "games/store";
        $this->view->render('body');
    }

    private function new_game()
    {
        $this->model->new_game();
    }

    private function game($id, $tab = "basic"){
        if(isset($_POST['form'])){
            if($_POST['form'] == "updatePost"){
                $this->view->output = $this->model->updateGame($id);
            } else if($_POST['form'] == "publishArticle"){
                $this->view->output = $this->model->publishGame($id);
            } else if($_POST['form'] == "generalGameImage"){
                $this->view->output = $this->model->generalGameImage($id);
            } else if($_POST['form'] == "addImageForm") {
                $this->view->output = $this->model->addImageForm($id);
            } else if($_POST['form'] == "addGamePlatform") {
                $this->view->output = $this->model->addGamePlatform($id);
            } else if($_POST['form'] == "updateGamePlaform") {
                $this->view->output = $this->model->updateGamePlaform($id);
            } else if($_POST['form'] == "addGameStore") {
                $this->view->output = $this->model->addGameStore($id);
            } else if($_POST['form'] == "updateGameStore") {
                $this->view->output = $this->model->updateGameStore($id);
            } else if($_POST['form'] == "addGameGenre") {
                $this->view->output = $this->model->addGameGenre($id);
            } else if($_POST['form'] == "updateGameGenre") {
                $this->view->output = $this->model->updateGameGenre($id);
            } else if($_POST['form'] == "addGameVideo") {
                $this->view->output = $this->model->addGameVideo($id);
            } else if($_POST['form'] == "generalGameVideo") {
                $this->view->output = $this->model->generalGameVideo($id);
            }
        }

        $this->view->game = $this->model->getGame($id);
        $this->view->images = $this->model->getGameImages($id);
        $this->view->availablePlatforms = $this->model->getAvailablePlatforms($id);
        $this->view->status = $this->model->getStatus();
        $this->view->gamePlatforms = $this->model->getGamePlatform($id);
        $this->view->availableStores = $this->model->availableStores($id);
        $this->view->gameStores = $this->model->getGameStores($id);
        $this->view->gameGenres = $this->model->getGameGenre($id);
        $this->view->videos = $this->model->getGameVideos($id);

        $this->view->tab = $tab;

        $this->view->activePage = "game";

        $this->view->content = "games/game";
        $this->view->render('body');
    }

    private function games($type = "all", $currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form']))
        {
            if($_POST['form'] == "editAll") {
                $this->view->output = $this->model->editAllGames();
            } else if($_POST['form'] == "publishArticle") {
                $this->view->output = $this->model->publishGame();
            } else if($_POST['form'] == "deleteArticle") {
                $this->view->output = $this->model->deleteGame();
            }
        }
        $this->view->type = $type;
        $this->view->games = $games = $this->model->getGames($type);

        $this->view->pageTitle = "Games - (" . count($games) . ")";
        if($type == 'published'){
            $this->view->pageTitle = "Published Games - (" . count($games) . ")";
        } else if($type == "Draft"){
            $this->view->pageTitle = "Drafted Games- (" . count($games) . ")";
        }


        $this->view->activePage = "games";

        $this->view->content = "games/games";
        $this->view->render('body');
    }

    //Games Area Ends Here

    private function category($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addCategoryForm"){
                $this->view->output = $this->model->addCategory();
            } else if($_POST['form'] == "deleteCategory"){
                $this->view->output = $this->model->deleteCategory();
            }
        }
        $this->view->activePage = "category";
        $this->view->categories = $this->model->getCategories();

        $this->view->content = "blog/category";
        $this->view->render('body');
    }

    private function users($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])){
            if($_POST['form'] == "addUserForm"){
                $this->view->output = $this->model->addAdmin();
            } else if($_POST['form'] == "deleteRole"){
                $this->view->output = $this->model->deleteUser();
            }
        }

        $this->view->activePage = "users";
        $this->view->users = $this->model->getUsers();
        $this->view->roles = $this->model->getRoles();

        $this->view->content = "blog/users";
        $this->view->render('body');
    }

    private function roles($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "addRoleForm"){
                $this->view->output = $this->model->addRole();
            } else if($_POST['form'] == "deleteRole"){
                $this->view->output = $this->model->deleteRole();
            }
        }

        $this->view->activePage = "roles";
        $this->view->roles = $this->model->getRoles();

        $this->view->content = "blog/roles";
        $this->view->render('body');
    }

    private function links($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "createLink"){
                $this->view->output = $this->model->addLink();
            } elseif($_POST['form'] == "deleteLink"){
                $this->view->output = $this->model->deleteLink();
            }
        }

        $this->view->activePage = "links";
        $this->view->links = $this->model->getLinks();
        $this->view->link_groups = $this->model->getLinkGroups();

        $this->view->content = "blog/links";
        $this->view->render('body');
    }

    private function link_group($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "createLinkGroup"){
                $this->view->output = $this->model->createLinkGroup();
            } else if($_POST['form'] == "deleteLinkGroup"){
                $this->view->output = $this->model->deleteLinkGroup();
            }
        }

        $this->view->activePage = "link_group";
        $this->view->link_groups = $this->model->getLinkGroups();

        $this->view->content = "blog/page_group";
        $this->view->render('body');
    }


    private function tags ($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form'])){
            if($_POST['form'] == "deleteTag"){
                $this->view->output = $this->model->deleteTag();
            }
        }

        $this->view->activePage = "tags";
        $this->view->tags = $this->model->getTags();

        $this->view->content = "blog/tags";
        $this->view->render('body');
    }

    private function role($id){
        if(isset($_POST['form'])) {
            if($_POST['form'] == "modifyAccess") {
                $this->view->output = $this->model->modifyAccess($id);
            } else if($_POST['form'] == "removeAccess") {
                $this->view->output = $this->model->removeAccess($id);
            } else if($_POST['form'] == "addAllAccess") {
                $this->view->output = $this->model->addAllAccess($id);
            } else if($_POST['form'] == "removeAllAccess") {
                $this->view->output = $this->model->removeAllAccess($id);
            }
        }


        $this->view->activePage = "roles";
        $this->view->role = $role = $this->model->getRole($id);
        $this->view->pageTitle = $role['role'] ." - access";

        $this->view->access = $this->model->getAccess($id);
        $this->view->access2 = $this->model->getAccessDetailed($id);
        $this->view->links = $this->model->getLinks();

        $this->view->content = "blog/role";
        $this->view->render('body');
    }

    private function new_article()
    {
        $this->model->newArticle();
        /**
        if(isset($_POST['form'])){
            if($_POST['form'] == "newArticle"){
                $this->view->output = $this->model->newArticle();
            }
        }
        $this->view->activePage = "new_article";
        $this->view->categories = $this->model->getCategories();

        $this->view->content = "blog/new_article";
        $this->view->render('body');
        **/
    }

    private function article($id){
        if(isset($_POST['form'])){
            if($_POST['form'] == "updatePost"){
                $this->view->output = $this->model->updatePost($id);
            } else if($_POST['form'] == "publishArticle"){
                $this->view->output = $this->model->publishArticle($id);
            }
        }
        $this->view->categories = $this->model->getCategories();
        $this->view->article = $this->model->getArticle($id);

        $this->view->activePage = "article";

        $this->view->content = "blog/article";
        $this->view->render('body');
    }

    private function articles($type = "all", $currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form']))
        {
            if($_POST['form'] == "editAll") {
                $this->view->output = $this->model->editAll();
            } else if($_POST['form'] == "publishArticle") {
                $this->view->output = $this->model->publishArticle();
            } else if($_POST['form'] == "deleteArticle") {
                $this->view->output = $this->model->deleteArticle();
            }
        }
        $this->view->type = $type;
        $this->view->articles = $articles = $this->model->getArticles($type);

        $this->view->pageTitle = "Articles - (" . count($articles) . ")";
        if($type == 'published'){
            $this->view->pageTitle = "Published Articles - (" . count($articles) . ")";
        } else if($type == "top"){
            $this->view->pageTitle = "Top Articles - (" . count($articles) . ")";
        }


        $this->view->activePage = "articles";

        $this->view->content = "blog/articles";
        $this->view->render('body');
    }

    private function deletePostTags($id){
        $this->view->tag = $this->model->deletePostTags($id);
    }

    private function checkTags($post){
        $this->view->tags = $this->model->checkTags($post);
        $this->view->render('blog/checkTags');
    }

    private function getTags($post){
        $this->view->tags = $this->model->getTagsAjax($post);
        $this->view->render('blog/getTags');
    }

    private function addTag($post){
        $this->view->tags = $this->model->addTag($post);
    }

    private function myManager($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        $this->view->images = $this->model->imageManager();
        $this->view->render('blog/imagesManager');
    }

    private function fileupload(){
        $this->model->fileupload();
    }

    private function imageManager($currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        $this->view->images = $this->model->imageManager();
        $this->view->render('blog/imageGallery');
    }

    private function addToGameGallery($game, $currentPag = 1){
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        $this->view->game = $game;
        $this->view->images = $this->model->availableImages($game);
        $this->view->render('games/game/gameGalleryContainer');
    }

    private function setGameGallery($game, $image)
    {
        $this->model->setGameGallery($game, $image);
    }

    private function deleteFile(){
        $this->model->deleteFile();
    }

    private function setGameImage($game){
        $this->model->setGameImage($game);
    }

    private function setArticleImage($game){
        $this->model->setArticleImage($game);
    }

    private function logout() {
        session::destroy();
        header("location:" . URL ."login/");
        exit();
    }

    private function checkLog()
    {
        $logged = session::get('loggedIn');
        $role = session::get('role');
        if ($logged == false) {
            $this->login();
            exit;
        }
    }

    private function sendImage($id, $type = "thumb")
    {
        return $this->model->sendImage($id, $type);
    }
}