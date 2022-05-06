$(document).ready( function() {

    if( $.cookie('mycounter_pages')==undefined)
    {
        $.cookie('mycounter_pages', "[]");
    }

    let cururl = window.location.href;
    var url_lists = JSON.parse($.cookie('mycounter_pages'));
    url_lists.map(function(url) {
        if(url==cururl)
        {
            $(".counter").addClass('like-counter');
            return;
        }
    });

    function ajaxSend(cururl, likemethod)
    {
        $.ajax({
            type: "POST",
            url: "counter.php",
            dataType: "json",
            data: {
                url: cururl,
                method: likemethod
            },
            success: function (data) {
                
                if(likemethod=='unlike')    // current no-like, if click, I like it
                {
                    var url_lists = JSON.parse($.cookie('mycounter_pages'));
                    url_lists.push(cururl);
                    $.cookie('mycounter_pages' , JSON.stringify( url_lists) );


                    $('.heart-img').parent().addClass('like-counter');
                }


                if(likemethod=='like')      // current like, if click, I dislike it.
                {
                    var url_lists = JSON.parse($.cookie('mycounter_pages'))
                    let new_array = [];
                    url_lists.map( function( url,idx) {
                        if(url!=cururl) new_array.push(url);
                    });
                    $.cookie('mycounter_pages', JSON.stringify( new_array) );
                    

                    $('.heart-img').parent().removeClass('like-counter');
                }

                if(data.result=='ok')
                {
                    $('.counternum').html(data.count);
                    if(data.count==0)
                    {
                        $('.counternum').html('');
                        $('.heart-img').parent().removeClass('like-counter');
                    }
                }
            },
            error: function () {
                alert('ajax Error');console.log('ajax Error')                
            }
        });
    }
    $('.heart-img').click( function(){
        let cururl = window.location.href;
        if( $(this).parent().hasClass('like-counter') )
            ajaxSend(cururl, 'like');
        else
            ajaxSend(cururl, 'unlike');
    });
});