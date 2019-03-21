'use strict';

document.addEventListener('DOMContentLoaded', function(){
    let dropDowns = document.querySelectorAll('select');
    if (dropDowns) {
        for (var i = 0; i < dropDowns.length; i++) {
            dropDowns[i].addEventListener('change', function (event) {
                if (event.target.value !== 'null') {
                    window.location = '?method=' + event.target.value;
                }
            });
        }
    }
});