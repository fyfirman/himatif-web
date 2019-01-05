// Jgn dihapus
// const moreInfo = document.querySelector(".reveal-action a");
// console.log(moreInfo);
const detailProfile = document.querySelector("#overlay");
const close = document.querySelector("#header-detail>span>i")

function showInfo(){
    console.log("Button clicked");
    detailProfile.style.display = 'block';
}

close.addEventListener('click',function(){
    detailProfile.style.display = 'none';
});