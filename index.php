<?php
/**
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="da">
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/style_default.css" type="text/css" />
</head>
<body style="overflow-y: scroll; height: 101%;";>
<table class="tbl_Outer" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td align="center" style="margin-top:67px;">
	
<!-- TOP SECTION -->
	<!-- TOP START -->
		<table class="tbl_Top" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td align="left"><a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/top_logo01.gif" width="" height="" alt="" /></a></td>
			<td align="right" valign="bottom"><a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/flag_dan.gif" class="displainline padrgt5" width="" height="" alt="" /></a><a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/flag_en.gif" class="displainline padrgt1" width="" height="" alt="" /></a></td>
		</tr>
		</table>

	<!-- MENU START -->
		<table class="tbl_Menu h3_15" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
		
<?php 
if (isset($_REQUEST["view"])) {
	$view = $_REQUEST["view"]; // get the view input 
}
if (isset($_REQUEST["id"])) {
	$articleid = $_REQUEST["id"]; // get the articleid input 
} 
$sectionid = ""; 
$catid = "";
?>	



		
		
			<?php 
			$con = mysql_connect("localhost","iis","roediisgroed");
			mysql_set_charset('utf8', $con);
			
			if (!$con) {
			  die('Could not connect: ' . mysql_error());
			}
			mysql_select_db('jomiug', $con);
			?>
<?php 
if ($view == "article") { 			
	$result = mysql_query("SELECT * FROM jos_content where id = $articleid ");
	while($row = mysql_fetch_array($result)) {
		$sectionid = $row['sectionid'];
		$catid = $row['catid'];
	} 
}
?>				
			
			<?php 
			$mainmenu = "mainmenu";
			$result = mysql_query("SELECT link, name FROM jos_menu where menutype = '$mainmenu' order by ordering");
			while($row = mysql_fetch_array($result)) {
				if ($view == "article") { 
					if (strpos($row['link'], 'id=' . $articleid) === false) {
						echo '<td><a href="' . $row['link'] . '" class="anc_menu">' . $row['name'] . '</a></td>';
					} else {
						echo '<td class="bgcol_999"><a href="' . $row['link'] . '" class="anc_menu">' . $row['name'] . '</a></td>';
					}
				} else {
					if ($row['name'] == "FORSIDE") {
						echo '<td class="bgcol_999"><a href="' . $row['link'] . '" class="anc_menu">' . $row['name'] . '</a></td>';
					} else {
						echo '<td><a href="' . $row['link'] . '" class="anc_menu">' . $row['name'] . '</a></td>';
					}
				}
			}
			?>		
			<!--  
			<td class="bgcol_999"><a href="iug_page00_front.htm" class="anc_menu">FORSIDE</a></td>
			<td><a href="iug_page01_omiug.htm" class="anc_menu">OM IUG</a></td>
			<td><a href="iug_page02_projekter.htm" class="anc_menu">PROJEKTER</a></td>
			<td><a href="iug_page03_lokalafdelinger.htm" class="anc_menu">LOKALAFDELINGER</a></td>
			<td><a href="iug_page04_stoetiug.htm" class="anc_menu">STØT IUG</a></td>
			<td><a href="iug_page05_nyheder.htm" class="anc_menu">NYHEDER</a></td>
			-->
		</tr>
		</table>
<!-- TOP SECTION (END) -->

<!-- DYNAMIC CONTENT SECTION -->

<?php if ($view == "article") { ?>
 
 
    
<!-- TOP IMAGE -->	
		<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/photo02.jpg" width="905" height="251" class="padtop15" alt="" />
	<!-- CONTENT 3-COL TABLE -->
		<table border="0" class="tbl_3Col" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td class="tbl_col1" valign="top"><!-- LEFT COLUMN -->
				<table border="0" cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td valign="top">
					<?php 
					$result = mysql_query("SELECT * FROM jos_content where sectionid = $sectionid order by ordering");
					while($row = mysql_fetch_array($result)) { 
						if ($row['id'] == $articleid) { ?>
							<div class="menu_left_item_selected"><a href="index.php?option=com_content&view=article&id=<?php echo $row['id'] ?>" class="anc_menu"><?php echo $row['title'] ?></a></div>
						<?php } else { ?>
							<div class="menu_left_item"><a href="index.php?option=com_content&view=article&id=<?php echo $row['id'] ?>" class="anc_menu"><?php echo $row['title'] ?></a></div>
						<?php } ?>
						
						
						<div><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/menuleft_divider01.gif" width="" height="" alt="" /></div>
					<?php } ?>	
					<!--  
					<div class="menu_left_item_selected"><a href="/" class="anc_menu">Om IUG</a></div>
					<div><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/menuleft_divider01.gif" width="" height="" alt="" /></div>
					<div class="menu_left_item"><a href="/" class="anc_menu">Beredskabet</a></div>
					<div><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/menuleft_divider01.gif" width="" height="" alt="" /></div>
					<div class="menu_left_item"><a href="/" class="anc_menu">Samarbejdespartnere</a></div>
					<div><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/menuleft_divider01.gif" width="" height="" alt="" /></div>
					<div class="menu_left_item"><a href="/" class="anc_menu">Donerer</a></div>
					<div><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/menuleft_divider01.gif" width="" height="" alt="" /></div>
					-->
					</td>
				</tr></table>
			</td><!-- MDDLE COLUMN -->
			
			<?php 
			$result = mysql_query('SELECT * FROM jos_content where id = ' . $articleid . ' ');
			while($row = mysql_fetch_array($result)) {
			$sectionid = $row['sectionid'];
			$catid = $row['catid'];
			?>
			<td class="tbl_col2 h6" valign="top">
				<div class="headermain h1"><?php echo $row['title'] ?></div>
				<?php echo $row['introtext'] ?>
			<?php } ?>
			</td>
			<!-- RIGHT COLUMN -->
			<td class="tbl_col3" valign="top">

				<table border="0" class="tbl_Print" cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/testicon_fb_twitter_mail.gif" width="" height="" alt="" /></td>
					<td align="right"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/print01.gif" width="" height="" alt="" /></td>
				</tr></table>

				<table class="bgcol_ccc h6" style="width:215px; padding:16px;" border="0" cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td style="line-height:25px;"><div class="btm_box_header">Dokumenter</div>
					<a href="/">Sidst �rsberetning</a><br />
					<a href="/">Seneste regnskab</a><br />
					<a href="/">Ref. fra generalforsmalingen</a><br />
					<a href="/">Vedt�gter</a><br />
					<a href="/">Forretningsplan</a><br />
					<div class="padtop5" style="line-height:normal;">Du kan finde �ldre udgaver af dokumenterne i <a href="/">Materialer</a></div></td>
				</tr></table>

			</td>
		</tr></table>    
    
   
    
    
<?php } else { ?>


	<!-- CONTENT #1 START -->
		<table border="0" class="tbl_Content" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td align="left" style="width:690px;"><a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/photo01.jpg" width="675" height="230" alt="" /></a></td>
			<td valign="top">
				<table border="0" style="width:215px; height:230px;" cellpadding="0" cellspacing="0">
				<tr>
					<td class="bgcol_ccc padlft5"><a href="/" class="anc_menu">Slide #1</a></td>
				</tr><tr>
					<td class="bgcol_999 padlft5"><a href="/" class="anc_menu">Slide #2</a></td>
				</tr><tr>
					<td class="bgcol_ccc padlft5"><a href="/" class="anc_menu">Slide #3</a></td>
				</tr><tr>
					<td class="bgcol_999 padlft5"><a href="/" class="anc_menu">Slide #4</a></td>
				</tr><tr>
					<td class="bgcol_ccc padlft5"><a href="/" class="anc_menu">Slide #5</a></td>
				</tr></table>
			</td>
		</tr></table>


<!-- BOXES BOTTOM START -->
		<table class="tbl_Top" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td class="padrgt15">
	<!-- TBL #4 -->
				<table border="0" class="linkbox_nolink" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top"><div class="btm_box_header">Og klassikeren lirum larum</div>
					<div class="btm_box_content">
						<div class="f9date">01.01.1001</div>
						<a href="/">Nyheder #1</a>
						<div class="f9date">01.01.1001</div>
						<a href="/">Nyheder #2</a>
						<div class="f9date">01.01.1001</div>
						<a href="/">Nyheder #3</a>
					</div>
					</td>
				</tr></table>
			</td><td valign="top" class="padrgt15">
	<!-- TBL #1 -->
				<table border="0" class="linkbox" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top"><div class="btm_box_header">Nyheder</div>
					<div class="btm_box_content">fghf fghd fj fghj fghjfhgjfghj fghj fgh</div></td>
				</tr><tr>
					<td class="linkbox_link h6" align="right" valign="bottom"><a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/link_arrow.gif" width="11" height="11" style="display:inline; padding-right:3px;" alt="" />Læs mere</a></td>
				</tr></table>
		</td><td class="padrgt15">
	<!-- TBL #2 -->
				<table border="0" class="linkbox" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top"><div class="btm_box_header">IUG søger frivillige til semenariet</div>
					<div class="btm_box_content">fghf fghd fj fghj fghjfhgjfghj fghj fgh</div></td>
				</tr><tr>
					<td class="linkbox_link h6" align="right" valign="bottom"><a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/link_arrow.gif" width="11" height="11" style="display:inline; padding-right:3px;" alt="" />Læs mere</a></td>
				</tr></table>
			</td><td>
	<!-- TBL #3 -->
				<table border="0" class="linkbox" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top"><div class="btm_box_header">Tag med en tur i det grønne, der spises og danses</div>
					<div class="btm_box_content">fghf fghd fj fghj fghjfhgjfghj fghj fgh</div></td>
				</tr><tr>
					<td class="linkbox_link h6" align="right" valign="bottom"><a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/link_arrow.gif" width="11" height="11" style="display:inline; padding-right:3px;" alt="" />Læs mere</a></td>
				</tr></table>
			</td>
		</tr></table>
<!-- DYNAMIC CONTENT (END) -->

<?php } ?>



<jdoc:include type="modules" name="debug" />

</td>
</tr><tr>
	<td class="h6 hgt40">&copy; Ingeniører uden Grænser 2012 <a href="/">Sitemap</a> | <a href="/">Downloads</a></td>
</tr></table>
</body></html>
			<?php
			mysql_close($con);
			?>
