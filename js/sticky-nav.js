// JavaScript Document

$(document).on("scroll",function(){
    if($(document).scrollTop()>100){
        $("#masthead").removeClass("large").addClass("small");
    } else{
        $("#masthead").removeClass("small").addClass("large");
    }
});