//** 2024 Tomori! Copyright By ShuShuicu */
console.log("\n%c %s %c %s %c %s\n", "color: #fff; background: #34495e; padding:5px 0;", "Theme: Tomori", "background: #fadfa3; padding:5px 0;", "https://blog.miomoe.cn", "color: #fff;background: #d6293e; padding:5px 0;", "B站@Tomori");
// piciv
function checkInput() {
    text = document.getElementById("inputer").value;
    type_pic = document.getElementsByName("tp");
    for(var i=0; i<3; i++) {
        if(type_pic[i].checked) {
            type = type_pic[i].value;
        }
    }
    image_e = document.getElementById('image');
    image_e.src = "https://i0.wp.com/pixiv.re/" + text + "." + type;
}