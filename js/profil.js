let cardProfil = document.getElementById("card_profil");
let card_block = document.getElementById("card_block");
let count = 0;
let isShowed = false;
// document.body.addEventListener("click",(e)=>{
//     if(e.target==cardProfil){
//         card_block.style.display="block "
//         count++
//         console.log(count);
//     }else if(e.target==cardProfil && count%2!=0){
//         card_block.style.display="none "
//         count++
//         console.log(count);
//     }else{
//         card_block.style.display="none "
//     }

// })

cardProfil.addEventListener("click", () => {
  isShowed = !isShowed;
  card_block.style.display = isShowed ? "block" : "none";
});

document.body.addEventListener("click", (e) => {
  if (e.target != cardProfil) {
    card_block.style.display = "none";
    isShowed = false;
  }
});
