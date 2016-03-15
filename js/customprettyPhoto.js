  $(document).ready(function(){ 
	      $('.entry-content a').has('img').addClass('prettyPhoto');  
        $("a[class^='prettyPhoto']").prettyPhoto();  
      }); 
	  
	      $('.entry-content a img').click(function () {  
        var desc = $(this).attr('title');  
        $('.entry-content a').has('img').attr('title', desc);  
    });   
   