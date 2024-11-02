<?php
/**
 * Tomori Index
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
    <div :class="{ pagesText: true, pagesTextShow: pageIndex == 0 }">
        <div class="pagesTextBox">
            <h1><?php
                if (empty($this->getArchiveTitle())) {
                    echo _t('「首页」');
                } else {
                    $this->archiveTitle(array(
                        'post' => _t('%s'),
                        'page' => _t('%s'),
                        'category' => _t('%s'),
                        'search'   => _t('%s'),
                        'tag'      => _t('%s'),
                        'author'   => _t('%s')
                    ), '「', '」');
                }
                ?></h1>
            <small>最新文章推荐，精彩尽在咫尺！</small>
            <ul class="giteeBoxUL">
            <?php while($this->next()): ?>
            <li>
                <div class="giteeBoxTitle">
                    <?php $this->category(',', true, '暂无分类'); ?>
                    /
                    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </div>
                <p class="giteeBoxText"><?php $this->excerpt(); ?></p>
                <p class="giteeBoxTime">发布于：<?php $this->date(); ?></p>
                <a href="<?php $this->permalink() ?>" class="aClick show">查看</a>
            </li>
            <?php endwhile; ?>

            <li style="text-align: center;">
                <?php $this->pageLink('上一页'); ?>
                第 <?php echo $this->_currentPage > 1 ? $this->_currentPage : 1; ?> 页 / 共 <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?> 页
                <?php $this->pageLink('下一页','next'); ?>
            </li>

        </ul>
        </div>
    </div>