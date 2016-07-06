<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content"class="col-md-12">
<div id="contentleft"class="col-md-8">
	<ul>

<?php doAction('index_loglist_top'); ?>

<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>

	<li class=" col-md-6" style="list-style: none ;border-right:1px solid whitesmoke">
	<h2><?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
	<p class="date"><?php echo gmdate('Y-n-j', $value['date']); ?> <?php blog_author($value['author']); ?> 
	<?php blog_sort($value['logid']); ?> 
	<?php editflg($value['logid'],$value['author']); ?>
	</p>
	<?php echo $value['log_description']; ?>
	<p class="tag"><?php blog_tag($value['logid']); ?></p>
	<p class="count">
	<a href="<?php echo $value['log_url']; ?>#comments">评论(<?php echo $value['comnum']; ?>)</a>
	<a href="<?php echo $value['log_url']; ?>">浏览(<?php echo $value['views']; ?>)</a>
	</p>
	<div style="clear:both;"></div>
<?php 
endforeach;
else:
?>
	<h2>抱歉</h2>
	<p>该博客还没有一篇文章</p>
<?php endif;?>

<div id="pagenavi">
	<?php echo $page_url;?>
</div>

</li><!-- end #contentleft-->
	</ul>
	</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>