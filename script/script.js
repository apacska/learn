$(document).ready(function(){
    var res=false, regval;
    function bordercolor(element,res){
        if(res) element.css("border","1px solid #44C414");
        else element.css("border", "1px solid #C42928");
    }
    function validate(val,regex,min,max){
        regval=regex.test(val);
        if(regval && val.length>=min && val.length<=max) return true;
    }
    function validator(element,type,min,max){
        var val=element.val();
        var usernameReg = /^[a-zA-Z0-9]*[a-zA-Z]+[a-zA-Z0-9]*$/;
        var passwordReg = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#.?!@$%^&*-]).{8,}$/;
        if(type=="username"){
            res=validate(val,usernameReg,min,max);
            if(res) {
                bordercolor(element,res);
                return true;
            }
            else {
                bordercolor(element,res);
                return false;
            }
        }
        else if(type=="password"){
            res=validate(val,passwordReg,min,max);
            if(res) {
                bordercolor(element,res);
                return true;
            }
            else {
                bordercolor(element,res);
                return false;
            }
        }
    }
    $("div#login a").click(function(){
       $("div#signup").show("slow");
        $("div#login").hide("slow");
    });
    $("div#signup a").click(function(){
        $("div#login").show("slow");
        $("div#signup").hide("slow");
    });
    var user=$("div#signup input:text");
    var password=$("div#signup input:password");
    var button=$("div#signup input:submit");
    user.keyup(function(){
        validator(user,"username",3,15);
    });
    password.keyup(function(){
        validator(password,"password",8,15);
    });
    button.click(function(){
        validator(user,"username",3,15);
        validator(password,"password",8,15);
    });
    $("form").submit(function(e){
        if(!validator(user,"username",3,15)) e.preventDefault();
        if(!validator(password,"password",8,15)) e.preventDefault();
    });

});