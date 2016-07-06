<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content"class="col-md-12">
<div id="contentleft"class="col-md-8">
	<ul style="margin-top: 10px;padding-left: 0px;">

<?php doAction('index_loglist_top'); ?>

<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>

	<li class="col-md-6" style="list-style: none ;/*border:1px solid red*/;height: 400px;overflow-y: scroll">
		<div style="border: 1px solid black;padding: 5px;">
		<span><img  style="width: 280px;" src="<?php echo $value['log_thumbUrl']; ?>"/></span>
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
	<div style="clear:both;"></div></div>
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