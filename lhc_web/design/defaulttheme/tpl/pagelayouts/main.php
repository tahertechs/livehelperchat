<!DOCTYPE html>

<html lang="<?php echo erConfigClassLhConfig::getInstance()->getDirLanguage('content_language')?>" dir="<?php echo erConfigClassLhConfig::getInstance()->getDirLanguage('dir_language')?>" ng-app="lhcApp">
	<head>
		<?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_head.tpl.php'));?>
	</head>
<body ng-controller="LiveHelperChatCtrl as lhc">

<?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/top_menu.tpl.php'));?>

<div class="container-fluid">

<?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/path.tpl.php'));?>
<?php $canUseChat = erLhcoreClassUser::instance()->hasAccessTo('lhchat','use'); ?>

<div class="row">

    <div class="col-sm-<?php $canUseChat == true ? print '8' : print '12'; ?> col-md-<?php $canUseChat == true ? print '9' : print '12'; ?>">
    	<?php echo $Result['content']; ?>
    </div>

    <?php if ($canUseChat == true) :    
    $pendingTabEnabled = (int)erLhcoreClassModelUserSetting::getSetting('enable_pending_list',1);
    $activeTabEnabled = (int)erLhcoreClassModelUserSetting::getSetting('enable_active_list',1);
    $closedTabEnabled = (int)erLhcoreClassModelUserSetting::getSetting('enable_close_list',0);
    $unreadTabEnabled = (int)erLhcoreClassModelUserSetting::getSetting('enable_unread_list',1); ?>
    <div class="columns col-sm-4 col-md-3" id="right-column-page" ng-cloak>
        <?php include(erLhcoreClassDesign::designtpl('lhchat/lists_panels/transfer_panel_container.tpl.php'));?>
        <?php include(erLhcoreClassDesign::designtpl('lhchat/lists_panels/right_panel_container.tpl.php'));?>
    </div>
    <?php endif; ?>

</div>

<?php include_once(erLhcoreClassDesign::designtpl('pagelayouts/parts/page_footer.tpl.php'));?>

</div>

<?php if (erConfigClassLhConfig::getInstance()->getSetting( 'site', 'debug_output' ) == true) {
		$debug = ezcDebug::getInstance();
		echo $debug->generateOutput();
} ?>

</body>
</html>