"use strict";function wpbc_flextimeline_nav(timeline_obj,nav_step){jQuery(".wpbc_timeline_front_end").trigger("timeline_nav",[timeline_obj,nav_step]);jQuery('#'+timeline_obj.html_client_id+' .flex_tl_prev,#'+timeline_obj.html_client_id+' .flex_tl_next').remove();jQuery('#'+timeline_obj.html_client_id+' .flex_tl_title').html('<span class="glyphicon glyphicon-refresh wpbc_spin"></span> &nbsp Loading...');if('function'===typeof jQuery(".popover_click.popover_bottom").popover)
jQuery('.popover_click.popover_bottom').popover('hide');jQuery.ajax({url:wpbc_ajaxurl,type:'POST',success:function success(data,textStatus){if(textStatus=='success'){jQuery('#'+timeline_obj.html_client_id+' .wpbc_timeline_ajax_replace').html(data);return!0}},error:function error(XMLHttpRequest,textStatus,errorThrown){window.status='Ajax Error! Status: '+textStatus;alert('Ajax Error! Status: '+XMLHttpRequest.status+' '+XMLHttpRequest.statusText)},data:{action:'WPBC_FLEXTIMELINE_NAV',timeline_obj:timeline_obj,nav_step:nav_step,wpdev_active_locale:wpbc_active_locale,wpbc_nonce:document.getElementById('wpbc_nonce_'+timeline_obj.html_client_id).value}})}
;