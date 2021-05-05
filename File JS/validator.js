
function Validator(options) {
   
     var formElement = document.querySelector(options.form);
     
     

     if (formElement){
       options.rules.forEach(function (rule)  {
        var inputElement = formElement.querySelector(rule.selector);
        var errorElement = inputElement.parentElement.querySelector('.form-mesage');

        if (inputElement) {
            inputElement.onblur = function() {
                var errorMessage = rule.test(inputElement.value);

                if(errorMessage){
                    errorMessage.innerText = errorMessage;
                }
            }
        }
       });
     }
}

Validator.isRequired = function(selector){
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined :  message || 'Vui lòng nhập trường này'
        }
    };

}

Validator.isEmail = function(selector){
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined :  message || 'Trường này phải là email';
        }
    };

}