$(document).ready(function(){

    //global variable
    isResult = true;

    //get numbers on click
    $('body').on('keyup',function(event){
        switch(event.keyCode){
            case 8:
                $(".delete").click();
            break;
            case 13:
                $(".equal").click();
            break;
            case 48:
                display(0);
            break;
            case 49:
                display(1);
            break;
            case 50:
                display(2);
            break;
            case 51:
                display(3);
            break;
            case 52:
                display(4);
            break;
            case 53:
                display(5);
            break;
            case 54:
                display(6);
            break;
            case 55:
                display(7);
            break;
            case 56:
                display(8);
            break;
            case 57:
                display(9);
            break;
            case 106:
                display('*');
            break;
            case 107:
                display('+');
            break;
            case 109:
                display('-');
            break;
            case 190:
                display('.');
            break;
            case 111:
                display('/');
            break;
            case 187:
                $(".equal").click();
            break;

        }
    });

    $(".calculator-button").on('click', function(event){
        var _display = $("#display");

        if($(this).hasClass('equal')){
            var temp = _display.val();

            //try to execute the expression
            try{
                _display.val(eval(temp));
                isResult = true;
            }catch(err){
                alert('Check your input');
            }
        }else{
            display($(this).data('number'));
        }
        $(".equal").focus();
    });
});

function display(value){
    var _display = $("#display");
    if(value==='change'){
        _display.val(-_display.val());
    }else if(value==='delete'){
        if(isResult){
            _display.val('0');
        }else{
            //delete last character
            _display.val(_display.val().slice(0, -1));
        }
        if(_display.val()===''){
            _display.val('0');
        }
    }else if(value==='clear'){
        _display.val('0');
        isResult = true;
    }
    else{
        if((isResult || _display.val()==='0') && value!=='.' && value!=='*' && value!=='+' && value!=='/' && value!=='-'){
            //after equal button is clicked variable isResult is set to true
            //the next value will be replaced with new value
            _display.val(value);            
        }
        else{            
            _display.val(_display.val() + '' + value);
        }
        isResult = false;
    }    
};