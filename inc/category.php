<?php
/**
 * Tomori Index Category
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div :class="{ pagesText: true, pagesTextShow: pageIndex == 1 }">
    <div class="pagesTextBox">
        <h1>全部分类</h1>
        <small>最新的分类推荐，精彩尽在咫尺！</small>
        <ul class="giteeBoxUL">
        <?php \Widget\Metas\Category\Rows::alloc()->to($cates); ?>
            <?php while ($cates->next()): ?>
            <li>
                <div class="giteeBoxTitle">
                    <a href="<?php $cates->permalink(); ?>" <?php if($this->is('category', $cates->slug)): ?>class="text-blue"<?php endif; ?>><?php $cates->name(); ?></a>
                    <small><?php $cates->count(); ?>篇文章</small>
                </div>
                <p class="giteeBoxText">
                <?php $cates->description(); ?>
                </p>
                <a href="<?php $cates->permalink(); ?>" class="aClick show">查看</a>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>
</div>