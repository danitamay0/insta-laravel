window.onload = function() {
   //estudiarlo
   var url='http://instagram-lara.com.devel/';
    alert("js charged");

    $(".dislike").css("cursor", "pointer");

    $(".like").css("cursor", "pointer");
    function like() {
        $(".dislike").unbind('click').click( function() {
           
           
            $(this)
                .addClass("like")
                .removeClass("dislike");
            $(this).attr("src", url+"/img/red-heart.png");
          
            
            $.ajax({
                url:url + 'like/' + $(this).data('id'),
                type:'GET',
                success: function(response){
                    
                    if(response.like){
                        console.log('like');
                        
                    }else{
                        console.log('error al dar like');
                        
                    }

                }

            });
            dislike();
        });

       
           
    }
    like();

    function dislike() {
        $(".like").unbind('click').click( function (){
            $(this)
                .addClass("dislike")
                .removeClass("like");
            $(this).attr("src", url+"img/black-heart.png");
            $.ajax({
                url:url + 'dislike/' + $(this).data('id'),
                type:'GET',
                success: function(response){
                    
                    if(response.message){
                        console.log('dislike');
                        
                    }else{
                        console.log('error al dar like');
                        
                    }

                }

            });
        like();
        });

       
    }
    dislike();

};
