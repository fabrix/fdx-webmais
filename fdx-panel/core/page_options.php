<?php
	function fdx_elapsed_string($ptime) {
		$etime = time() - $ptime;

		if ($etime < 1) {
			return '0 seconds';
		}

		$a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
					30 * 24 * 60 * 60       =>  'month',
					24 * 60 * 60            =>  'day',
					60 * 60                 =>  'hour',
					60                      =>  'minute',
					1                       =>  'second'
					);

		foreach ($a as $secs => $str) {
			$d = $etime / $secs;
			if ($d >= 1) {
				$r = round($d);
				return $r . ' ' . $str . ($r > 1 ? 's' : '');
			}
		}
	}
?>

<div class="clear"></div>
<div id="zoomWrap">
    <div id="fdx-Head">
        <script type="text/javascript">
        var fdx_ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
        </script>
        <div id="zoomLoading">
            <p>Loading</p>
        </div>
        <div id="zoomSuccess">
            <p>Options successful saved</p>
        </div>
        <div id="zoomFail">
            <p>Can't save options. Please contact <a href="http://fabrix.net/">Fabrix.net support</a>.</p>
        </div>
        <div id="fdx-Logo">
            <a href="http://fabrix.net/fdx-panel/" target="_blank">
                <img src="<?php echo fdx::$assetsPath; ?>/images/logo.png" alt="*" />
            </a>
        </div>
        <div id="fdx-Theme">
            <h3>Welcome Back <a href="<?php echo admin_url('profile.php');?>"><?php global $current_user; echo $current_user->display_name; ?></a></h3>
        </div>
     </div>

     <div class="head_meta">
        <div id="zoomFramework">
            <h5>v<?php echo fdx::$fdxVersion ?></h5>
        </div>
        <div id="fdx-Info">
            <ul>
               <li>
                    You last edited your settings <strong><em><?php echo fdx_elapsed_string(get_site_option( 'fdx_edited_time' )); ?></em></strong> ago.
                </li>
            </ul>
        </div>
    </div>

    <div class="admin_main">
        <div id="fdx-Nav">
            <?php adminDashboard::menu(); ?>
            <div class="cleaner">&nbsp;</div>
        </div><!-- end #zooNav -->

        <div class="tab_container">
            <form id="zoomForm" method="post">
                	<?php adminDashboard::content(); ?>

                <input type="hidden" name="action" value="save" />
              <?php wp_nonce_field('fdx-ajax-save'); ?>
              	<input type="hidden" id="nonce" name="_ajax_nonce" value="<?php echo wp_create_nonce('fdx-ajax-save'); ?>" />
            </form>

        </div><!-- end .tab_container -->
        <div class="clear"></div>
    </div> <!-- /.admin_main -->

    <div class="zoomActionButtons">

        <form id="zoomReset" method="post">
            <p class="submit" style="float:right;" />
                <input name="reset" class="button-secondary" type="submit" value="Reset settings" />
                <input type="hidden" name="action" value="reset" />
            </p>
        </form>

        <p class="submit">
            <input id="submitZoomForm" name="save" class="button-primary" type="submit" value="Save all changes" />
        </p>
    </div><!-- end of .zoomActionButtons -->

</div><!-- end #zoomWrap -->
