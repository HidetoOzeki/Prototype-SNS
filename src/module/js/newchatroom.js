/*phpで新しいチャットルームを作るまたは既存のチャットルームのIDを返す */
$(function(){
    console.log("newchatroom.js is running");

    $("#startchat").on("click",function(){
        console.log("チャットボタンが押されました");
        $.ajax({
            type: 'POST',
            url: 'module/newchatroom.php',
            dataType: 'text',
            data: {user_id: $("#user_id").val(), other_user_id: $("#other_user_id").val()},
        }).done(function(data){
            //$("#ajax").html(data);
            //console.log(data);
        });
    });

});