/*
 * main.js
 */

window.addEventListener("load", function(){
    // ハイライト
    var ePreList = document.querySelectorAll(".entry pre");
    
    for (var i=0,len=ePreList.length; i<len; ++i) {
        var pre = ePreList[i];
        pre.setAttribute("class", "prettyprint");
    }
    
    prettyPrint();
}, false);
