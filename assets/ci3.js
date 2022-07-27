$(document).ready(function(){
    
    var file 

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
    

    //-------------- Upload files 
    $('input[type="file"]').change(function(e) {
        //console.log(fileDetails)
        $("#fileDetails").show();
        $("#Ferror").hide();
        $("#Fsuccess").hide();
        $("#Isuccess").hide();
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
               //console.log("loading..")
               $("#fileDetails").hide();
               $("#loading").show();
            },
            success: function(result){ 
                $("#loading").hide();
                tata.success('Upload File', 'File has been uploaded successfully');
                $("#fileDetails").hide();
                $("#uploadFile").trigger('reset');
                $(".custom-file-label").text("Choose another file")
                $("#Fsuccess").show();
                $("#Fsuccess").html("<p>File has been uploaded successfully.</p>");
                //location.reload();
                //console.log(result);
            },
            error: function(result){ 
                $("#loading").hide();
                $("#fileDetails").show();
                $("#Ferror").show();
                //tata.error('Upload File', result.responseJSON.error.error);
                $("#Ferror").html("Can't upload the file")
                console.log(result);
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
    
    //--------- import excel
    $("#uploadExcelFile").submit(function(event){
        event.preventDefault();
        file = $('#uploadedExcelFile').prop("files")[0]; // Get the file
        form = new FormData(); // Making the form object        
        form.append("uploadedExcelFile", file); // Adding the file to the form
        //console.log(file)
        $.ajax({
            type: "POST",
            url: "read",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
               //console.log("loading..")
               $("#fileDetails").hide();
               $("#loading").show();
            },
            success: function(result){ 
                $("#pickFields").html("")
                $("#loading").hide();
                tata.success('Upload File', 'File has been uploaded successfully');
                $("#fileDetails").hide();
                $("#uploadFile").trigger('reset');
                $(".custom-file-label").text("Choose file")
                $("#Fsuccess").show();
                $("#Imsg").html("<div class='class alert alert-success' role='alert'> <p>Please pick the fields you want to import.<b> Accept text fields only</b></p> </div>");
                // console.log(JSON.parse(result))
                 JSON.parse(result).forEach((element) => {
                     if (element != null) {
                         //console.log(element)
                         $("#pickFields").append('<div class="col-lg-2 mb-4" > <div class="card bg-light"> <div class="align-self-center pt-3 pb-3"><h5>'+element+'</h5></div> <div class="card-body align-self-center"><div><input class="form-check-input" style="width: 30px; height: 30px; margin-top:-30px" checked type="checkbox" value="'+element+'" name="fields[]"></div></div></div></div>')
                     }
                 });             
            },
            error: function(result){ 
                tata.error('Upload File', "Can't read the file");
                $("#loading").hide();
                $("#fileDetails").show();
                $("#Ferror").show();
                $("#Ferror").html("Can't read the file")
                //console.log(result);
            },
        });        
    })

    //--------- save to DB
    $("#importFields").click(function(){
        var checkedFeilds = []
        $("input[name='fields[]']:checked").each(function ()
        {
            checkedFeilds.push($(this).val());
        });        
        //console.log(checked)
        form = new FormData(); // Making the form object        
        form.append("uploadedExcelFile", file); // Adding the file to the form
        form.append("selectedField", checkedFeilds); // Adding selected Fields to the form
        
        $.ajax({
            type: "POST",
            url: "update", // without db/ becuase the route is inside db/ 
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                //console.log("loading..")
                $("#Fsuccess").hide();
                $("#loading").show();
            },
            success: function(result){ 
                $("#loading").hide();
                $("#Isuccess").show();
                tata.success('Upload', 'Fields has beet imported successfully');
                console.log(result);
            },
            error: function(result){ 
                $("#loading").hide();
                $("#Fsuccess").show();
                $("#Imsg").html("<div class='alert alert-danger' role='alert'><b>Can't save data in DB. Accept text only</b></div>");
                tata.error('DB Error', 'Fiald to imported');
                console.log(result);
            },
        });
    })
});
