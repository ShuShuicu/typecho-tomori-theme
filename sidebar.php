<?php
/**
 * Tomori sidebar
 * @package Tomori
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!-- 页面版块2 -->
<div class="pages pages2">
    <!-- 页面选项卡 -->
    <div class="pagesTitle">
        <div class="pagesTitleOption pagesTitleOption-click">
            <img src="<?php $this->options->themeUrl('assets/images/icecream.png'); ?>" alt="icecream" />
            <p>Sidebar.md</p>
        </div>
    </div>

    <!-- 页面 -->
    <div class="pagesText pagesTextShow">
        <div class="pagesTextBox pagesTextBox2">
            <?php if ($this->is('index')): ?>
                <?php echo $this->options->sidebarInfo ? $this->options->sidebarInfo : $this->options->description(); ?>
            <?php endif; ?>
            <?php if ($this->is('post')): ?>
                <h1>文章信息</h1>
                <h2><?php $this->date(''); ?> · <?php art_count($this->cid); ?>字</h2>
                <p>分类：<?php $this->category(',', true, '暂无分类'); ?></p>
                <p>标签：<?php $this->tags(',', true, '暂无标签'); ?></p>
                <br>
                <small>本站文章大部分为原创，用于个人学习记录，可能对您有所帮助，仅供参考！</small>
                <br><br>
                <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
        <h2><?php $this->commentsNum(_t('「暂无评论」'), _t('「仅有一条评论」'), _t('「已有 %d 条评论」')); ?></h2>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()): ?>
                <?php else: ?>
                    <p>
                        <label for="author" class="required"><?php _e('称呼'); ?></label>
                        <input type="text" name="author" id="author" class="text"
                               value="<?php $this->remember('author'); ?>" required/>
                    </p>
                    <p>
                        <label
                            for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
                        <input type="email" name="mail" id="mail" class="text"
                               value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </p>
                    <p>
                        <label
                            for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
                        <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>"
                               value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </p>
                <?php endif; ?>
                <p>
                    <label for="textarea" class="required"><?php _e('内容'); ?></label>
                    <textarea rows="8" cols="50" name="text" id="textarea" class="textarea"
                              required><?php $this->remember('text'); ?></textarea>
                </p>
                <p>
                    <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
                </p>
            </form>
        </div>
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>


            <?php endif; ?>
            <?php if ($this->is('page')): ?>
                <h1>页面信息</h1>
                <h2><?php $this->date(''); ?> · <?php art_count($this->cid); ?>字</h2>
            <?php endif; ?>
        </div>
    </div>
</div>