<?php
/**
 * Tomori Post Content
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div :class="{ pagesText: true, pagesTextShow: pageIndex == 0 }">
    <div class="pagesTextBox">
        <h1>「<?php $this->title() ?>」</h1>
        <br><?php $this->content(); ?>
    </div>
</div>
