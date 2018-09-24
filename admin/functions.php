<?php

function connect($database){
    try{
        $connect = new PDO('mysql:host=localhost;dbname='. $database['db'], $database['user'], $database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function cleardata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars ($data);
    return $data;
}

function actual_page(){
    
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function number_pages($items_per_page, $connect){

    $total_places = $connect->prepare('SELECT FOUND_ROWS() AS total');
    $total_places->execute();
    $total_places = $total_places->fetch()['total'];

    $number_pages = ceil($total_places / $items_per_page);
    return $number_pages;
}


function recently_added($connect){

$sentence = $connect->prepare('SELECT * FROM places ORDER BY place_date DESC LIMIT 8');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_places($connect){

$sentence = $connect->prepare('SELECT * FROM places ORDER BY place_date DESC LIMIT 8');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_places($connect)
{
    
    $sentence = $connect->prepare("SELECT places.*,places_categories.place_category_name AS category_name,places_types.place_type_name AS type_name FROM places,places_categories,places_types WHERE places.place_category = places_categories.place_category_id AND places.place_type = places_types.place_type_id"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_place($id_place){
    return (int)cleardata($id_place);
}

function get_place_per_id($connect, $id_place){
    $sentence = $connect->query("SELECT places.*,places_categories.place_category_name AS category_name,places_types.place_type_name AS type_name FROM places,places_categories,places_types WHERE places.place_id = $id_place AND places.place_category = places_categories.place_category_id AND places.place_type = places_types.place_type_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_gallery($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {
$id = intval($_GET['id']);

$sentence = $connect->prepare('SELECT * FROM gallery WHERE place_id = ?');
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function get_all_places_categories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM places_categories ORDER BY place_category_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_category($id_category){
    return (int)cleardata($id_category);
}

function get_category_per_id($connect, $id_category){
    $sentence = $connect->query("SELECT * FROM places_categories WHERE place_category_id = $id_category LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_places_types($connect)
{
    
    $sentence = $connect->prepare("SELECT places_types.*,places_categories.place_category_name AS category_name FROM places_types,places_categories WHERE places_types.place_type_category = places_categories.place_category_id ORDER BY place_type_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_type($id_type){
    return (int)cleardata($id_type);
}

function get_type_per_id($connect, $id_type){
    $sentence = $connect->query("SELECT places_types.*,places_categories.place_category_name AS category_name FROM places_types,places_categories WHERE place_type_id = $id_type AND places_types.place_type_category = places_categories.place_category_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_offers_categories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM offers_categories ORDER BY offer_category_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_offers_categories($id_offers_categories){
    return (int)cleardata($id_offers_categories);
}

function get_offer_category_per_id($connect, $id_offers_categories){
    $sentence = $connect->query("SELECT * FROM offers_categories WHERE offer_category_id = $id_offers_categories LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_offers($connect)
{
    
    $sentence = $connect->prepare("SELECT offers.*,offers_categories.offer_category_name AS category_name FROM offers,offers_categories WHERE offers.offer_category = offers_categories.offer_category_id ORDER BY offer_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_offer($id_offer){
    return (int)cleardata($id_offer);
}

function get_offer_per_id($connect, $id_offer){
    $sentence = $connect->query("SELECT offers.*,offers_categories.offer_category_name AS category_name, places.place_name AS place_name FROM offers,offers_categories,places WHERE offers.offer_id = $id_offer AND offers.offer_category = offers_categories.offer_category_id AND offers.offer_place = places.place_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_newscategories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM news_categories ORDER BY news_category_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_newscategory($id_newscategory){
    return (int)cleardata($id_newscategory);
}

function get_newscategory_per_id($connect, $id_newscategory){
    $sentence = $connect->query("SELECT * FROM news_categories WHERE news_category_id = $id_newscategory LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_news_categories($connect){

$sentence = $connect->prepare('SELECT * FROM news_categories');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_news($connect)
{
    
    $sentence = $connect->prepare("SELECT news.*,news_categories.news_category_name AS category_name FROM news,news_categories WHERE news.news_category = news_categories.news_category_id ORDER BY news_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_news($id_news){
    return (int)cleardata($id_news);
}

function get_news_per_id($connect, $id_news){
    $sentence = $connect->query("SELECT news.*,news_categories.news_category_name AS category_name FROM news,news_categories WHERE news.news_id = $id_news AND news.news_category = news_categories.news_category_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}


function get_all_users($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM users ORDER BY user_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_user($id_user){
    return (int)cleardata($id_user);
}

function get_user_per_id($connect, $id_user){
    $sentence = $connect->query("SELECT * FROM users WHERE user_id = $id_user LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function id_order($id_order){
    return (int)cleardata($id_order);
}

function get_order_per_id($connect, $id_order){
    $sentence = $connect->query("SELECT * FROM orders WHERE order_id = $id_order LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_all_orders($connect)
{
    
    $sentence = $connect->query("SELECT * FROM orders"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_settings($connect)
{
    
    $sentence = $connect->query("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_strings($connect)
{
    
    $sentence = $connect->query("SELECT * FROM strings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function number_news($connect){

$total_numbers = $connect->prepare('SELECT * FROM news');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_places($connect){

$total_numbers = $connect->prepare('SELECT * FROM places');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}


function number_places_categories($connect){

$total_numbers = $connect->prepare('SELECT * FROM places_categories');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_newscategories($connect){

$total_numbers = $connect->prepare('SELECT * FROM news_categories');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_places_types($connect){

$total_numbers = $connect->prepare('SELECT * FROM places_types');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_offers_categories($connect){

$total_numbers = $connect->prepare('SELECT * FROM offers_categories');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_offers($connect){

$total_numbers = $connect->prepare('SELECT * FROM offers');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_users($connect){

$total_numbers = $connect->prepare('SELECT * FROM users');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function number_orders($connect){

$total_numbers = $connect->prepare('SELECT * FROM orders');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_places_categories($connect){

$sentence = $connect->prepare('SELECT * FROM places_categories');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_places_types($connect){

$sentence = $connect->prepare('SELECT * FROM places_types');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_offers_categories($connect){

$sentence = $connect->prepare('SELECT * FROM offers_categories');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_offers($connect){

$sentence = $connect->prepare('SELECT * FROM offers ORDER BY offer_id DESC LIMIT 3');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_news($connect){

$sentence = $connect->prepare('SELECT * FROM news ORDER BY news_id DESC LIMIT 3');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_users($connect){

$sentence = $connect->prepare('SELECT * FROM users ORDER BY user_id DESC');
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_orders($connect){

$sentence = $connect->prepare('SELECT * FROM orders ORDER BY order_id DESC');
$sentence->execute(array());
return $sentence->fetchAll();

}

function fecha($fecha){

    $timestamp = strtotime($fecha);
    $meses = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $ano = date('Y', $timestamp);

    $fecha = "$dia " . $meses[$mes] . " $ano";
    return $fecha;
}

?>