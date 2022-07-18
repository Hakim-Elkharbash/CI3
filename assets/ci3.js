$(document).ready(function(){
    $("#SaveChanges").click(function(){
        tata.text('Setting', 'Email has been updated', {
            //duration: 5000
        })
    })

    
    $("#addUser").submit(function(event){
        event.preventDefault();

        // if ($("#fullName").val() == ""){
        //     $("#nameError").html("Required");
        // }
        // if ($("#phone").val() == ""){
        //     $("#phoneError").html("Required");
        // }
        // if ($("#email").val() == ""){
        //     $("#emailError").html("Required");
        // }

        var formData = {
          name: $("#fullName").val(),
          phone: $("#phone").val(),
          email: $("#email").val(),
          note: $("#note").val(),
        };

        if (formData.name != "" && formData.phone != "" && formData.email != ""){
            $.ajax({
                type: "POST",
                url: "save", // without db/ becuase the route is inside db/ 
                data: formData,
                beforeSend: function(){
                   console.log("wait..")
                },
                success: function(result){ 
                    tata.success('Add User', 'User has been added successfully');
                    $("#addUser").trigger('reset'); 
                    //console.log(result);
                },
                error: function(result){ 
                    tata.success('DB Error', 'Fiald to add the user');
                    console.log(result);
                },
            });
        }else{
            tata.error('Input Error', 'Name is REQUIRED <br> Phone is REQUIRED <br> Email is REQUIRED', {
                duration: 10000
            })
        }
        
    });



    // delete user
    $(".delUser").click(function(){
        console.log($(this).attr('id'))
        $("#deleteModal").modal();
    })
    $("#ConfirmDelete").click(function(){
        $("#deleteModal").modal('hide');
        tata.success('Delete User', 'User has been deleted successfully');
    })


    // delete all users
    $("#delAll").click(function(){
        $("#deleteAllModal").modal();
    })

    $("#ConfirmDeleteAll").click(function(){
        $("#deleteAllModal").modal('hide');
        var formData = {
            tableName: "users",
        };

        $.ajax({
            type: "POST",
            url: "db/delAll",
            data: formData,
            beforeSend: function(){
               console.log("wait..")
            },
            success: function(result){ 
                tata.success('Delete All User', 'All users have been deleted successfully');
                location.reload();
                //console.log(result);
            },
            error: function(result){ 
                tata.success('DB Error', 'Fiald to delete all users');
                console.log(result);
            },
        });
    })
    
    
});
