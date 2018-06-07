class calculator{
    constructor(){
        this.val1 = '';
        this.val2 = '';
        this.flag = false;
    }
    add(){
        console.log(parseFloat(this.val1));
        this.val1 = parseFloat(this.val1) + parseFloat(this.val2);
        this.val2 = '';
        console.log('val1', this.val1);
        console.log('val2', this.val2);
    };
    substract(){
        return val1 - val2;
    };
    multiply(val1, val2){
        return val1 * val2;
    };
    divide(val1, val2){
        return val1 / val2;
    };
    delete(val){
        //delete one from right
    };
    clean(){
        //clean input
    };
    result(){
        // on =
    };
    operator(symbol){
        switch(symbol){
            case '+':
                this.flag = true;
            break;
        }
    }
}

module.exports = calculator;