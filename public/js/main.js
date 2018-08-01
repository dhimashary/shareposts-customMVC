
$(document).ready(function () {
    
	//adding active class on current page nav
	var url = window.location.pathname;
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        $('#navbars a').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).addClass('active');
            }
        });

    // $(window).scroll(function () { 
    //     if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
           
    //         flag+=4;
    //         alert(flag);
    //        $("#postContainer").load("http://localhost/shareposts/posts/loadmore/" + flag);
    //     }
    // });
    $("#btn-1").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-1").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p >Animal Section</p>");
        $("#subTitle").html("<p >Cute animals overload !!</p>");

    });
    $("#btn-2").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-2").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p >Anime Section</p>");
        $("#subTitle").html("<p>Even Samuel L. Jackson loves animes</p>");
    });
    $("#btn-3").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-3").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p>Automotive Section</p>");
        $("#subTitle").html("<p>Amazing & Coolest Automotive Maniac</p>");
    });
    $("#btn-4").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-4").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p >Cosplay Section</p>");
        $("#subTitle").html("<p>Let's see the best costume players in the world!</p>");
    });
    $("#btn-5").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-5").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p>Footballs Section</p>");
        $("#subTitle").html("<p>The biggest sports with the biggest fans in the world !</p>");
    });
    $("#btn-6").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-6").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p >Games Section</p>");
        $("#subTitle").html("<p>Fair play Fair Games! -Yugi Mutou</p>");
    });
    $("#btn-7").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-7").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p >Movie Section</p>");
        $("#subTitle").html("<p>A way to relax when you tired</p>");
    });
    $("#btn-8").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-8").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p >Sports Section</p>");
        $("#subTitle").html("<p>Basically any other sports beside football</p>");
    });
    $("#btn-9").click(function(){
        $("#titleContainer").removeClass("d-none");
        var thumbnail = $("#thumb-9").attr("src");
        $("#thumbnail").attr("src",thumbnail);
        $("#mainTitle").html("<p >Technology Section</p>");
        $("#subTitle").html("<p>Let's go to Mars shall we?</p>");
    });

    //Adding Post with section as params
    $(".btn.pr-5").click( function () {
        var data =  jQuery(this).text();
        //$("#postContainer").empty();
        $("#postContainer").load("http://localhost/shareposts/posts/section/" + data);
    });
    $("#about").click( function () {
        $("#titleContainer").addClass('d-none');
        $("#postContainer").load("http://localhost/shareposts/pages/about");
    });
    $("#user-btn").click( function () {
        $("#titleContainer").addClass('d-none');
        var username = $(this).text();
        $("#postContainer").load("http://localhost/shareposts/users/showAccountPosts/" + username);
    });
    $(".showuser").click( function () {
        $("#titleContainer").addClass('d-none');
        var username = $(this).text();
        $("#postContainer").load("http://localhost/shareposts/users/showAccountPosts/" +username);
    });
    $(".btn.btn-dark").click( function () {
        $("#titleContainer").addClass('d-none');
        id_post =  jQuery(this).attr("id");
        $("#postContainer").load("http://localhost/shareposts/posts/show/" + id_post);
    });
    $("h4").click( function () {
        id_post=jQuery(this).siblings(".btn-dark").attr("id");
        $("#titleContainer").addClass('d-none');
        $("#postContainer").load("http://localhost/shareposts/posts/show/" + id_post);
    });
       $("#addComment").click( function () {
        var content = $("#comment").val();
        var post_id = $("input.d-none").val();
        if (content !== null && content !== '') {
            $.post("http://localhost/shareposts/posts/addComment",{post_id:post_id,
            content:content},function (result) {
            $("#result").after(result);
            });
        }


    });
        
       //-------------------------------------------
       // $("form").submit( function () {
       //  var comment = $("#comment").val();
       //  var post_id = $("input.d-none").val();
        
       //   $.ajax({
       //                  type: "POST",
       //                  url: "http://localhost/shareposts/posts/addComment",
       //                  data: "post_id=" + post_id+ "&content=" + comment,
       //                  success: function(data) {
       //                     alert("sucess");
       //                  }
       //              });
       //  // $("#postContainer").load("http://localhost/shareposts/posts/section/anime" );
       // });

       //------------------------------
    //    $("form").submit( function () {
    //     var post_id = $("input.d-none").val();
    //     var comment = $("#comment").val();
    //     $.ajax({
    //                     type: "POST",
    //                     url: "http://localhost/shareposts/posts/addComment",
    //                     data: "post_id=" + post_id+ "&content=" + comment,
    //                     success: function(data) {
    //                        alert("sucess");
    //                     }
    //                 });
    //     //$("#postContainer").load("http://localhost/shareposts/posts/show/" + post_id);
    //     // $("#titleContainer").addClass('d-none');
    //     // $("#postContainer").load("http://localhost/shareposts/posts/addComment");
    // });

    //alert("TESTER");
        // alert(jQuery(this).text());
        //      jQuery.ajax({
        //     data:  jQuery(this).text() ,
        //     url:'http://localhost/shareposts/posts/section/' + data,
        //     type: 'GET',
        //     success:function(data){}
        // });
//     function showPost(section) {
//     if (section == "") {
//         } else {
//         if (window.XMLHttpRequest) {
//             // code for IE7+, Firefox, Chrome, Opera, Safari
//             xmlhttp = new XMLHttpRequest();
//         } else {
//             // code for IE6, IE5
//             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//         }
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("postContainer").innerHTML = this.responseText;
//             }
//         };
//         xmlhttp.open("GET","getuser.php?q="+str,true);
//         xmlhttp.send();
//     }
// }


});