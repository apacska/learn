/**
 * Created by nz on 2015-10-21.
 */
$(document).ready(function(){
    $("b").click(function(){
       $("#stuffs").slideToggle();
    });
    var a = "div#stuffs #button";
    $(a).click(function(){
        $("div#add_new_container").show("slow");
    });
    $(".entypo-cancel").click(function(){
       $("#add_new_container").hide("slow");
    });
    $("div#login a").click(function(){
       $("div#signup").show("slow");
        $("div#login").hide("slow");
    });
    $("div#signup a").click(function(){
        $("div#login").show("slow");
        $("div#signup").hide("slow");
    });
});