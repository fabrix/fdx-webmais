  <div id="contentleft">
<div class="postarea" style="padding: 0">
<div id="slider-container">
<ul id="slider-box">

<!-- Start Slider Nav-->
<div class="slide-pager-container">
<div id="slide-pager"></div>
</div>


                    <?php if (option::get('slider_id_1') <> "" ) { $id1 = option::get('slider_id_1'); ?>
                    <li>
					<div class="photo-banner" style="background-image:url(<?php echo option::get('slider_img_1');?>)">
					<div class="corners">
                    <div class="text"><?php echo get_the_title($id1);?></div>
                    <a href="<?php echo get_permalink($id1);?>" class="link"></a>
                   	</div>
					</div>
					</li>
                    <?php }
                    if (option::get('slider_id_2') <> "" ) { $id2 = option::get('slider_id_2'); ?>
                    <li>
					<div class="photo-banner" style="background-image:url(<?php echo option::get('slider_img_2');?>)">
					<div class="corners">
                    <div class="text"><?php echo get_the_title($id2);?></div>
                    <a href="<?php echo get_permalink($id2);?>" class="link"></a>
                   	</div>
					</div>
					</li>
                    <?php }
                     if (option::get('slider_id_3') <> "" ) { $id3 = option::get('slider_id_3'); ?>
                    <li>
					<div class="photo-banner" style="background-image:url(<?php echo option::get('slider_img_3');?>)">
					<div class="corners">
                    <div class="text"><?php echo get_the_title($id3);?></div>
                    <a href="<?php echo get_permalink($id3);?>" class="link"></a>
                   	</div>
					</div>
					</li>
                    <?php }
                        if (option::get('slider_id_4') <> "" ) { $id4 = option::get('slider_id_4'); ?>
                    <li>
					<div class="photo-banner" style="background-image:url(<?php echo option::get('slider_img_4');?>)">
					<div class="corners">
                    <div class="text"><?php echo get_the_title($id4);?></div>
                    <a href="<?php echo get_permalink($id4);?>" class="link"></a>
                   	</div>
					</div>
					</li>
                    <?php }
                        if (option::get('slider_id_5') <> "" ) { $id5 = option::get('slider_id_5'); ?>
                    <li>
					<div class="photo-banner" style="background-image:url(<?php echo option::get('slider_img_5');?>)">
					<div class="corners">
                    <div class="text"><?php echo get_the_title($id5);?></div>
                    <a href="<?php echo get_permalink($id5);?>" class="link"></a>
                   	</div>
					</div>
					</li>
                    <?php } ?>

			</ul>
		</div>

</div>
 <script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
$(function() {
    $('#slider-box').cycle({
        fx:     '<?php echo option::get('cycle_efeito');?>',
        speed:  '<?php echo option::get('cycle_animspeed');?>',
        timeout: <?php echo option::get('cycle_pausetime');?>,
        pager:  '#slide-pager',
				slideExpr: 'li'
     });
});
/*]]>*/
</script>



<div class="postarea_transparent">
<?php
//opções do tema
$box1_cat = option::get('featured_category_1');
$box2_cat = option::get('featured_category_2');
$box3_cat = option::get('featured_category_3');
$box4_cat = option::get('featured_category_4');
$box5_cat = option::get('featured_category_5');
$box6_cat = option::get('featured_category_6');
$box7_cat = option::get('featured_category_7');
$box8_cat = option::get('featured_category_8');

//converte categoria nome em ID
$category_id1 = get_cat_ID($box1_cat);
$category_id2 = get_cat_ID($box2_cat);
$category_id3 = get_cat_ID($box3_cat);
$category_id4 = get_cat_ID($box4_cat);
$category_id5 = get_cat_ID($box5_cat);
$category_id6 = get_cat_ID($box6_cat);
$category_id7 = get_cat_ID($box7_cat);
$category_id8 = get_cat_ID($box8_cat);

//redenriza a função
    echo fdx_home_box($category_id1);
    echo fdx_home_box($category_id2);
    echo fdx_home_box($category_id3);
    echo fdx_home_box($category_id4);
    echo fdx_home_box($category_id5);
    echo fdx_home_box($category_id6);
    echo fdx_home_box($category_id7);
    echo fdx_home_box($category_id8);
?>
</div>

</div>