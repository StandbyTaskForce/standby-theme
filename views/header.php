<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo $site_name; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php echo $header_block; ?>
	<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
  ?>

  <script type="text/javascript">
    // Hide the sidebar, make the map full width
    function toggleSidebar(link, layer) {
      if ($("#"+link).text() == "<?php echo Kohana::lang('ui_main.show'); ?>") {
        $("#"+link).text("<?php echo Kohana::lang('ui_main.hide'); ?>");
        $('#content .floatbox').css('overflow', 'hidden').css('margin-left', '0');
        $('#map').width('100%');
        $('#mapStatus').width('100%');
        $('#right').show();
      }
      else {
        $("#"+link).text("<?php echo Kohana::lang('ui_main.show'); ?>");
        $('#content .floatbox').css('overflow', 'visible').css('margin-left', '7%');
        $('#map').width('810px');
        $('#mapStatus').width('810px');
        $('#right').hide();
      }
    }
  </script>

  <script src="<?php echo url::base() ?>themes/standby/js/standby.js" type="text/javascript"></script>
</head>

<?php 
  // Add a class to the body tag according to the page URI
  
  // we're on the home page
  if (count($uri_segments) == 0) 
  {
    $body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1) 
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2) 
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  };
    
  echo '<body id="page" class="'.$body_class.'" />';
  
?>
	<!-- wrapper -->
	<div class="rapidxwpr floatholder">

		<!-- header -->
		<div id="header">

			<!-- searchbox -->
			<div id="searchbox">
				
				<!-- user actions -->
				<div id="loggedin_user_action" class="clearingfix">
					<?php if($loggedin_username != FALSE){ ?>
						<a href="<?php echo url::site().$loggedin_role;?>"><?php echo $loggedin_username; ?></a> [<a href="<?php echo url::site();?>logout/front"><?php echo Kohana::lang('ui_admin.logout');?></a>]
					<?php } else { ?>
						<a href="<?php echo url::site()."members/";?>"><?php echo Kohana::lang('ui_main.login'); ?></a>
					<?php } ?>
				</div><br/>
				<!-- / user actions -->
				
        <div id="searchbox-wrapper">
          <!-- languages -->
          <?php echo $languages;?>
          <!-- / languages -->

          <!-- searchform -->
          <?php echo $search; ?>
          <!-- / searchform -->
        </div>

			</div>
			<!-- / searchbox -->
			
			<!-- logo -->
			<?php if($banner == NULL){ ?>
			<div id="logo">
				<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
				<span><?php echo $site_tagline; ?></span>
			</div>
			<?php }else{ ?>
			<a href="<?php echo url::site();?>"><img src="<?php echo url::base().Kohana::config('upload.relative_directory')."/".$banner; ?>" alt="<?php echo $site_name; ?>" /></a>
			<?php } ?>
			<!-- / logo -->
			
		</div>
		<!-- / header -->

		<!-- main body -->
		<div id="middle">
			<div class="background layoutleft">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
					<ul>
						<?php nav::main_tabs($this_page); ?>
					</ul>

        <?php echo $submit_btn; ?>
				</div>
				<!-- / mainmenu -->
