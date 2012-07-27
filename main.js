/*
 * main.js
 */


/*
 * prettyprint
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


/*
 * scroller
 */
window.addEventListener("load", function() {
    tm.Scroller.setup();
}, false);


/*
 * Mario
 */
(function(np) {
    
    var KEY_LEFT  = 37;
    var KEY_UP    = 38;
    var KEY_RIGHT = 39;
    var KEY_B     = 66;
    
    var keyboard = [];
    var isKey = function(key){ return keyboard[key]; };
    
    var floor = window.innerHeight - 50;
    
    var MARIO_BITMAP_WIDTH = 14;
    var MARIO_BITMAP_HEIGHT= 18;

    var colorList = [
        [0, 0, 0, 0],   // 透明
        [0xdc, 0x29, 0, 0xff],   // 赤
        [0xff, 0xa5, 0x3b, 0xff], // 肌
        [32, 32, 32, 0xff]   // 茶色
    ];
    
    var MARIO_BITMAP = [
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0,
        0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0,
        0, 0, 0, 3, 3, 3, 2, 2, 3, 2, 0, 0, 0, 0,
        0, 0, 3, 2, 3, 2, 2, 2, 3, 2, 2, 2, 0, 0,
        0, 0, 3, 2, 3, 3, 2, 2, 2, 3, 2, 2, 2, 0,
        0, 0, 3, 3, 2, 2, 2, 2, 3, 3, 3, 3, 0, 0,
        0, 0, 0, 0, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0,
        0, 0, 0, 3, 3, 1, 3, 3, 3, 0, 0, 0, 0, 0,
        0, 0, 3, 3, 3, 1, 3, 3, 1, 3, 3, 3, 0, 0,
        0, 3, 3, 3, 3, 1, 3, 3, 1, 3, 3, 3, 3, 0,
        0, 2, 2, 3, 1, 2, 1, 1, 2, 1, 3, 2, 2, 0,
        0, 2, 2, 2, 1, 1, 1, 1, 1, 1, 2, 2, 2, 0,
        0, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 0,
        0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0,
        0, 0, 3, 3, 3, 0, 0, 0, 0, 3, 3, 3, 0, 0,
        0, 3, 3, 3, 3, 0, 0, 0, 0, 3, 3, 3, 3, 0,
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
    ];
    
    np.Mario = function(param)
    {
        param = param || {};
        var scale = param.scale || 2;
        
        var eMario = document.createElement("canvas");
        eMario.width = MARIO_BITMAP_WIDTH  * scale;
        eMario.height= MARIO_BITMAP_HEIGHT * scale;
        document.body.appendChild(eMario);
        eMario.style.position = "fixed";
        eMario.style.left = "50px";
        eMario.style.top = "-50px";
        eMario.style.margin = "0";
        eMario.style.padding = "0";
        eMario.style.zIndex = "0";
        var floor = window.innerHeight - 50 - eMario.height;
        
        var setBitmap = function(){
            var tempCanvas = document.createElement("canvas");
            tempCanvas.width = MARIO_BITMAP_WIDTH;
            tempCanvas.height= MARIO_BITMAP_HEIGHT;
            var tempContext = tempCanvas.getContext("2d");
            var imageData = tempContext.createImageData(MARIO_BITMAP_WIDTH, MARIO_BITMAP_HEIGHT);
            
            for (var i=0; i<MARIO_BITMAP_WIDTH*MARIO_BITMAP_HEIGHT; ++i) {
                var colorIndex = MARIO_BITMAP[i];
                var color = colorList[colorIndex];
                imageData.data[i*4 + 0] = color[0];
                imageData.data[i*4 + 1] = color[1];
                imageData.data[i*4 + 2] = color[2];
                imageData.data[i*4 + 3] = color[3];
            }
            tempContext.putImageData(imageData, 0, 0);
            
            var context = eMario.getContext("2d");
            //context.fillRect(0, 0, eMario.width, eMario.height);
            context.drawImage(tempCanvas, 0, 0, MARIO_BITMAP_WIDTH, MARIO_BITMAP_HEIGHT, 0, 0, eMario.width, eMario.height);
        };
        setBitmap();
        
        
        
        document.addEventListener("keydown", function(e){
            keyboard[e.keyCode] = true;
        });
        document.addEventListener("keyup", function(e){
            keyboard[e.keyCode] = false;
        });
        
        var jump = 0;
        
        setInterval(function(){
            var x = Number( eMario.style.left.replace("px", '') );
            
            var speed = (isKey(KEY_B)) ? 2:1;
            
            if (isKey(KEY_LEFT)) {
                x-=5*speed;
                eMario.style.webkitTransform = "scaleX(-1)";
                eMario.style.MozTransform = "scaleX(-1)";
            }
            if (isKey(KEY_RIGHT)) {
                x+=5*speed;
                eMario.style.webkitTransform= "scaleX( 1)";
                eMario.style.MozTransform   = "scaleX( 1)";
            }
            
            if (x < 0) { x=window.innerWidth; }
            if (x > window.innerWidth) { x=0; }
            eMario.style.left = x + "px";
            
            var y = Number( eMario.style.top.replace("px", '') );
            
            if (y == floor && isKey(KEY_UP)) jump = -16;
            
            jump += 0.5;
            
            y += jump;
            
            if (y >= floor) {
                y = floor;
                jump = 0;
            }
            
            eMario.style.top = y + "px";
            
        }, 1000.0/30);
        
        // 高さを更新
        window.addEventListener("resize", function(){
            floor = window.innerHeight - 50 - eMario.height;
        });
        
    };
    
})(window);


window.addEventListener("load", function(){
    Mario();
}, false);

