function rateHover( id ){

    for( var i = 1; i < 5 ; i++){
    var imgBelow = document.getElementById( 'img' + i );
    imgBelow.src = 'http://www.jerrywickey.com/images/unstar.jpg';
    }

for( var i = 1; i < id ; i++){
    var imgBelow = document.getElementById( 'img' + i );
    imgBelow.src = 'http://www.jerrywickey.com/images/custar.jpg';
    }

var img = document.getElementById( 'img' + id );
            img.src = 'http://www.jerrywickey.com/images/custar.jpg';
        }

        function rateHoverOut( id ){
            var img = document.getElementById( 'img' + id );
            if( img.src != 'http://www.jerrywickey.com/images/fostar.jpg' ){
                img.src = 'http://www.jerrywickey.com/images/unstar.jpg';
            }

        }

        function rateCommit( id ){

            var img = document.getElementById( 'img' + id );
            img.src = 'http://www.jerrywickey.com/images/fostar.jpg';

            for( var i = 1; i < id ; i++){
                var imgBelow = document.getElementById( 'img' + i );
                imgBelow.src = 'http://www.jerrywickey.com/images/custar.jpg';
            }

            var rater = document.getElementById( 'andboson_filmzbundle_comments_rate' );
            rater.value = id;

        }