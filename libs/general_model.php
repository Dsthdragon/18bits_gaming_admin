<?php

class general_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getCategory(){
    	return $this->db->select("SELECT * FROM category WHERE parent IS NULL");
    }

    function getChildren($id){
    	return $this->db->select("SELECT * FROM category WHERE parent = :parent", array(':parent' => $id));
    }

    function getAccess($link)
    {
        $sth = $this->db->prepare("SELECT a.*, l.link as dLink, l.title as dTitle FROM access a LEFT JOIN link l ON a.link = l.id WHERE a.link = :link");
        $sth->execute(array(':link' => $link));
        return $sth->fetch();
    }

    function getNavLink()
    {
        return $this->db->select("SELECT l.*, COALESCE(lg.title, 'OTHERS') as group_name, COALESCE(lg.icon, '') as group_icon FROM access a LEFT JOIN link l ON l.id = a.link LEFT JOIN link_group lg ON l.group = lg.id WHERE l.navbar = 1 AND a.role = :role ORDER BY lg.title ASC, l.title ASC", array(':role' => $_SESSION['role']));
    }

    function getLinkParent($link){
        $sth = $this->db->prepare("SELECT * FROM link WHERE linkName = :link");
        $sth->execute(array(':link' => $link));
        return $sth->fetch();

    }

    function getNavLink2()
    {
        return $this->db->select("SELECT * FROM link WHERE navbar = 1 ORDER BY title ASC");
    }

    function getRandCategories()
    {
        return $this->db->select("SELECT * FROM categories ORDER BY RAND() LIMIT 6");
    }

    function user($id)
    {
        $sth = $this->db->prepare("SELECT * FROM user WHERE id = :id");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function getLastPost($id){
        $sth = $this->db->prepare("SELECT p.*, a.fullname, c.title as category_title, c.link as category_link, i.url, i.thumb FROM post p LEFT JOIN admin a ON a.id = p.admin LEFT JOIN image i ON i.id = p.image LEFT JOIN category c ON c.id = p.category WHERE p.published = 1 AND  p.category = :id OR p.category IN (SELECT id FROM category WHERE parent = :id) AND p.top = 1  ORDER BY p.created_at DESC");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    function moreTopNew($feature){
        $features = implode(',', $feature);
        return $this->db->select("SELECT p.*, a.fullname, c.title as category_title, c.link as category_link, i.url, i.thumb FROM post p LEFT JOIN admin a ON a.id = p.admin LEFT JOIN image i ON i.id = p.image LEFT JOIN category c ON c.id = p.category WHERE p.published = 1 AND  p.top = 1 AND p.id NOT IN ({$features}) ORDER BY created_at DESC");
    }

    function getTagPostCount($tag){
        $sth = $this->db->prepare("SELECT * FROM post_tag WHERE tag = :tag");
        $sth->execute(array(':tag' => $tag));
        return $sth->rowCount();
    }

    function getTopTags(){
        return $this->db->select("SELECT t.*, COALESCE(COUNT(pt.id), 0) as posts FROM tag t LEFT JOIN post_tag pt ON pt.tag = t.id GROUP BY t.id ORDER BY posts DESC limit 50");
    }

    function getPostTags($id){
        return $this->db->select("SELECT * FROM tag WHERE id IN (SELECT tag FROM post_tag WHERE post = :post)", array(':post' => $id));
    }

    function getViews($id){
        $sth = $this->db->prepare("SELECT * FROM views WHERE post = :id");
        $sth->execute(array(':id' => $id));
        return $sth->rowCount();
    }

}