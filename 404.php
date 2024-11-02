<?php
/**
 * Tomori Post
 * @package Tomori
 * @author 鼠子(ShuShuicu)
 * @version 1.0
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$this->need('inc/post/nav.php'); 
?>
<div :class="{ pagesText: true, pagesTextShow: pageIndex == 0 }">
<div class="pagesTextBox">
    <h1>Error 404</h1>
    <p>没想好放点什么</p>
</div>
</div> 
<?php
$this->need('inc/category.php'); 
$this->need('footer.php'); 
?>