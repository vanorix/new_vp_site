(function ($) {
    
    var token = '294403897.M2E4MWE5Zg==.OGIxN2M2YzYyNTJmN.DZhNGJhMjEwOGU3MjQ2NDU0NzU=',
    username = 'vicerdo', // rudrastyh - my username :)
    num_photos = 6;
 
    $.ajax({ // the first ajax request returns the ID of user rudrastyh
        url: 'https://api.instagram.com/v1/users/search',
        dataType: 'jsonp',
        type: 'GET',
        data: {access_token: token, q: username}, // actually it is just the search by username
        success: function(data){
            console.log(data);
            $.ajax({
                url: 'https://api.instagram.com/v1/users/' + data.data[0].id + '/media/recent', // specify the ID of the first found user
                dataType: 'jsonp',
                type: 'GET',
                data: {access_token: token, count: num_photos},
                success: function(data2){
                    console.log(data2);
                    for(x in data2.data){
                        $('.posts-instagram').append('<div class="post-instagram"><img src="'+data2.data[x].images.thumbnail.url+'"></div>');  
                    }
                    },
                error: function(data2){
                    console.log(data2);
                }
            });
        },
        error: function(data){
            console.log(data);
        }
    });

})(JQuery);