jQuery(document).ready(function($){jQuery("#test").is(":checked")?jQuery(".lemonway-live").hide():jQuery(".lemonway-test").hide(),jQuery("#test").click(function(e){jQuery("#test").is(":checked")?(jQuery(".lemonway-live").hide(),jQuery(".lemonway-test").show()):(jQuery(".lemonway-test").hide(),jQuery(".lemonway-live").show())})});