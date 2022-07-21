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



    $("#editUser").submit(function(event){
        event.preventDefault();

        var formData = {
          id: $("#id").val(),
          name: $("#fullName").val(),
          phone: $("#phone").val(),
          email: $("#email").val(),
          note: $("#note").val(),
        };

        if (formData.name != "" && formData.phone != "" && formData.email != ""){
            $.ajax({
                type: "POST",
                url: "../update", // without db/ becuase the route is inside db/ 
                data: formData,
                beforeSend: function(){
                   console.log("wait..")
                },
                success: function(result){ 
                    tata.success('Edit User', 'User has been updated successfully');
                    //$("#addUser").trigger('reset'); 
                    //console.log(result);
                },
                error: function(result){ 
                    tata.success('DB Error', 'Fiald to edit the user');
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
        //console.log(this.id)
        $("#deleteModal").modal();
        $("#deleteModal #userId").val(this.id);
    })


    $("#ConfirmDelete").click(function(){
        $("#deleteModal").modal('hide');
        //console.log($('#userId').val())
        var formData = {
            userId: $('#userId').val(),
        };

        $.ajax({
            type: "POST",
            url: "db/del",
            data: formData,
            beforeSend: function(){
               console.log("wait..")
            },
            success: function(result){ 
                tata.success('Delete User', 'User has been deleted successfully');
                location.reload();
                //console.log(result);
            },
            error: function(result){ 
                tata.success('DB Error', 'Fiald to delete all users');
                console.log(result);
            },
        });
    })


    // delete all users
    $("#delAllUsers").click(function(){
        $("#deleteAllUsersModal").modal();
    })

    $("#ConfirmDeleteAllUsers").click(function(){
        $("#deleteAllUsersModal").modal('hide');
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
    


    //-------------- UPLOAD
    
    $('input[type="file"]').change(function(e) {
        //console.log(fileDetails)
        $("#fileDetails").show();
        $("#Ferror").hide();
        $("#Fsuccess").hide();

        var fileDetails = e.target.files[0];
        $(".custom-file-label").text(fileDetails.name)
        $("#Fsize").html("<b> Size: </b>" + Math.round(fileDetails.size/1024) + " KB")
        $("#Ftype").html("<b> Type: </b>" + fileDetails.type)  
    });



    $("#uploadFile").submit(function(event){
        event.preventDefault();
        var file = $('#uploadedFile').prop("files")[0]; // Get the file
        var form = new FormData(); // Making the form object        
        form.append("uploadedFile", file); // Adding the image to the form
        //console.log(file)
        $.ajax({
            type: "POST",
            url: "upload",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
               console.log("wait..")
            },
            success: function(result){ 
                tata.success('Upload File', 'File has been uploaded successfully');
                $("#fileDetails").hide();
                $("#uploadFile").trigger('reset');
                $(".custom-file-label").text("Choose another file")
                $("#Fsuccess").show();
                $("#Fsuccess").html("<h5>File has been uploaded successfully.</h5>");
                //location.reload();
                //console.log(result);
            },
            error: function(result){ 
                tata.error('Upload File', result.responseJSON.error.error);
                $("#Ferror").show();
                $("#Ferror").html(result.responseJSON.error.error)
                //console.log(result);
            },
        });        
    })

    // delete file
    $(".delFile").click(function(){   
        //console.log(this.id)
        $("#deleteFileModal").modal();
        $("#deleteFileModal #fileName").val(this.id);
    })


    $("#ConfirmFileDelete").click(function(){
        $("#deleteFileModal").modal('hide');
        //console.log($('#fileName').val())
        var formData = {
            fileName: $('#fileName').val(),
        };

        $.ajax({
            type: "POST",
            url: "upload/del",
            data: formData,
            beforeSend: function(){
            console.log("wait..")
            },
            success: function(result){ 
                tata.success('Delete File', 'File has been deleted successfully');
                location.reload();
                //onsole.log(result);
            },
            error: function(result){ 
                tata.success('Error', 'Fiald to delete the file');
                console.log(result);
            },
        });
    })

});
