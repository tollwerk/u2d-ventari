'use strict';

document.addEventListener('DOMContentLoaded', function () {
    let forms = document.querySelectorAll('form.selector');
    if (forms) {
        for (let ii = 0; ii < forms.length; ii++) {
            let targetForm = forms[ii];
            let dropDowns = targetForm.querySelectorAll('select');
            if (dropDowns) {
                for (let i = 0; i < dropDowns.length; i++) {
                    dropDowns[i].addEventListener('change', function (event) {
                        if (event.target.value !== 'null') {
                            if (targetForm.method === 'get') {
                                addParam(targetForm, 'method', targetForm.method);
                                addParam(targetForm, 'function', event.target.value);
                            }

                            if (targetForm.method === 'post') {
                                targetForm.action = '?method=' + targetForm.method + '&function=' + event.target.value;
                            }

                            targetForm.submit();
                        }
                    });
                }
            }
        }
    }

    function addParam(form, key, value) {
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }
});