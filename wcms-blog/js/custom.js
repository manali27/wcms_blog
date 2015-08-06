$(document).ready(function(){

    var url = window.location.href;

    // passes on every "a" tag
    $("#user-collapse a").each(function() {
        // checks if its the same on the address bar
        if (url == (this.href)) {
            $(this).closest("li").addClass("active");
        }
    });

    $("#user-collapse a").click(function(e) {
        if (url == (this.href)) {
            e.preventDefault();
        }
    });

    $('#editor').summernote({
        height: 300,                 // set editor height
        minHeight: 300,             // set minimum height of editor
        maxHeight: 300,            // set maximum height of editor
        placeholder: "Enter post content",
        onKeydown: function(e) {
            $("#content-div").removeClass("has-error");
            $("#error-msg-content").hide();
        }
        //focus: true,                  // set focus to editable area after initializing summernote
    });

    $('#edit-editor').summernote({
        height: 300,                 // set editor height
        minHeight: 300,             // set minimum height of editor
        maxHeight: 300,            // set maximum height of editor
        //placeholder: "Enter post content",
        onKeydown: function(e) {
            $("#content-div").removeClass("has-error");
            $("#error-msg-content").hide();
        }
        //focus: true,                  // set focus to editable area after initializing summernote
    });

    $("#post-contents").dotdotdot({
        ellipsis    : '... ',
        height      : 200
    });

    if($("#errorlog").children().length !== 0) {
        $("#dangeralert").show();
    }
    else {
        $("#dangeralert").hide();
    }
    
    // ------------ Publishing Post -------------- 

    $("#publish-btn").click(function() {  
                    
        $("#errorlog").empty();
        $("#dangeralert").hide();
        $("#successlog").empty();
        $("#successalert").hide();

        var flag=0;
        var content = $('#editor').code();

        if($("#title").val().length === 0) {
            $("#title-div").addClass("has-error");
            $("#error-msg-title").show();
            flag=1;
        } 
        
        if($('#editor').summernote('isEmpty')) {        
            $("#content-div").addClass("has-error");
            $("#error-msg-content").show();
            flag=1;
        }

        if($("#email").val().length === 0) {
            $("#email-div").addClass("has-error");
            $("#error-msg-email").show();
            flag=1;
        }
                 
        if($("#password").val().length === 0) {
            $("#password-div").addClass("has-error");
            $("#error-msg-password").show();
            flag=1;
        }
                  
        if(flag === 1) {
            return false;
        }
        else {
            $("#addPost-form").submit(function() {
                //event.preventDefault();
                var input = $("<input>").attr("type", "hidden").attr("name", "content").val(content);
                $('#addPost-form').append($(input));
            });
        }

    });
    
    // ------------ Edit Post -------------  

    $("#edit-btn").click(function() {  
                    
        $("#errorlog").empty();
        $("#dangeralert").hide();
        $("#successlog").empty();
        $("#successalert").hide();

        var flag=0;
        var editcontent = $('#edit-editor').code();

        if($("#title").val().length === 0) {
            $("#title-div").addClass("has-error");
            $("#error-msg-title").show();
            flag=1;
        } 
        
        if($('#edit-editor').summernote('isEmpty')) {        
            $("#content-div").addClass("has-error");
            $("#error-msg-content").show();
            flag=1;
        }

        if($("#email").val().length === 0) {
            $("#email-div").addClass("has-error");
            $("#error-msg-email").show();
            flag=1;
        }
                 
        if($("#password").val().length === 0) {
            $("#password-div").addClass("has-error");
            $("#error-msg-password").show();
            flag=1;
        }
                  
        if(flag === 1) {
            return false;
        }
        else {
            $("#editPost-form").submit(function() {
                //event.preventDefault();
                var input = $("<input>").attr("type", "hidden").attr("name", "content").val(editcontent);
                $('#editPost-form').append($(input));
            });
        }

    });


    $("#title").keypress(function() {
        $("#title-div").removeClass("has-error");
        $("#error-msg-title").hide();
    });
                
    $("#email").keypress(function() {
        $("#email-div").removeClass("has-error");
        $("#error-msg-email").hide();
    });
                
    $("#password").keypress(function() {
        $("#password-div").removeClass("has-error");
        $("#error-msg-password").hide();
    });
        
});