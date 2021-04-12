$(function(){
    $(".users").click(function(){
    let id=$(this).data("id");
    let username=$(this).data("username");
    let role=$(this).data("role");
    $("#id").val(id);
    $("#username").val(username);
    $("#role").val(role);
})
    $('#d1').click(function(){
        let id=$('#id').val();
        let username=$('#username').val();
        let role=$('#role').val();
        if(role!="0" && id!="")
        {
            $.post("updateUser.php?option=update", {id:id,username:username,role:role}, function(response){
            $('#result').html(response);
            location.reload();
            return false;
            })
        }
        else $('#result').html('You must select the user first before updating the role!');
    })
})