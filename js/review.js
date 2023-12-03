
const addReview = document.querySelector("#addReview")
const newReview = document.querySelector("#newReview")

addReview.addEventListener('click', () =>{
  if(newReview.classList.contains('hide')){
    console.log("test")
    newReview.classList.remove('hide')
  }
})