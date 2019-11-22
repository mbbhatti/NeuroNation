$().ready(function() { 
   
    // Validate login form on keyup and submit
    $("#loginForm").validate({
        rules: {            
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {            
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            email: "Please enter a valid email address"
        }
    });
    
});