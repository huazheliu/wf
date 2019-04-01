

var canvas = document.getElementById("canvas");

    var ctx = canvas.getContext("2d");

    ctx.fillStyle = 'rgba(0,0,0,0.3)';
    ctx.fillRect(0,0,400,300);
    ctx.strokeStyle = 'rgb(0,0,0)';
    ctx.lineWidth  = 1;
    ctx.strokeRect(0,0,400,300);

    ctx.beginPath();
    ctx.arc(0,0,150,0,2*Math.PI,true);
    ctx.closePath();
    ctx.fillStyle= 'rgba(255,0,0,0.5)';
    ctx.fill();


ctx.fillStyle = '#eef';
ctx.fillRect(0,0,400,300);
var n = 0,
    dx = 150,
    dy = 150,
    s = 100;
ctx.beginPath();
ctx.fillStyle = 'rgb(100,250,100)';
ctx.strokeStyle = 'rgb(0,0,100)';
var x = Math.sin(0),
    y = Math.cos(0),
    dig = Math.PI / 15 * 11;
for (var i = 0; i < 30; i++) {
    var x = Math.sin(i * dig),
        y = Math.cos(i * dig);
    ctx.lineTo(dx + x * s, dy + y * s);
}
ctx.closePath();
ctx.fill();
ctx.stroke();
