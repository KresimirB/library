let _calculator = require('./_calculator.js');

$(document).ready(function(){
    // elem = getElementById('calculator-icon');
    let calculator = new _calculator();

    $("#_display").on('change', function(){
        console.log(parseFloat($(this).val()));
    });
    $('body').on('keyup',function(event){
        console.log(event.keyCode);
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
        let _display = $("#display");//definicija varijable let display

        if($(this).hasClass('equal')){// ako ima clasa equal
            let temp = _display.val();//definicija unesene vrjednosti u ekran
            _display.val(eval(temp));//
        }else{
            display($(this).data('number'));
        }
        $(".equal").focus();
    });
});

function display(value){
    let _display = $("#display");
    if(value==='change'){
        _display.val(-_display.val());
    }else if(value==='delete'){
        _display.val(_display.val().slice(0, -1));
        if(_display.val()===''){
            _display.val('0');
        }
    }else if(value==='clear'){
        _display.val('0');
    }
    else{
        if(_display.val()==='0' && value!=='.' && value!=='x'){
            _display.val(value);
        }
        else{
            _display.val(_display.val() + '' + value);
        }
    }


    // if(_display.val()===''){
    //     _display.val(0);
    // }
};