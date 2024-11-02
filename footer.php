<?php
/**
 * Tomori Footer
 * @package Tomori
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('sidebar.php'); 
?>

                    <!-- 底部版权 -->
                    <div class="footer">
                        <p class="left">&copy; 2024 <?php $this->options->title(); ?> | <?php echo get_theme(); ?>丨<?php echo timer_stop(); ?></p>
                        <p class="right"><?php if ($this->options->icpCode) { echo '<a href="https://beian.miit.gov.cn/" target="_blank" rel="external nofollow noopener">' . $this->options->icpCode . '</a>'; } else { echo '正在努力备案中...'; } ?></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php $this->options->themeUrl('assets/js/style.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('assets/js/vue.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('assets/js/axios.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('assets/js/viewer.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('assets/js/N0ts.js'); ?>" type="module"></script>
        <script src="<?php $this->options->themeUrl('assets/code/prism.js'); ?>" type="module"></script>
        <script src="<?php $this->options->themeUrl('assets/code/clipboard.min.js'); ?>" type="module"></script>
    </body>
</html>