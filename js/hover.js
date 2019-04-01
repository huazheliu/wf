




$(function(){
    document.getElementById('c5').onmouseout = function(){
        document.getElementById('p5').style.color = "#929292";
        document.getElementById('p5').style.textShadow = "none";
    }
}

$(function(){
    var sign=document.getElementById("c1");
    var sign1=document.getElementById("p1");
    changBkColor(sign , sign1);
});
function changBkColor(obj1 ,obj2 ){
    obj1.onmouseover=function(){ obj2.style.color="#929292"; };//鼠标悬停事件
    obj1.onmouseout=function(){ obj2.style.textShadow="none"; };//鼠标离开事件
}
