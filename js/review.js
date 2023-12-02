
const addReview = document.querySelector("#addReview")
const newReview = document.querySelector("#newReview")

addReview.addEventListener('click', () =>{
  if(newReview.classList.contains('hide')){
    newReview.classList.remove('hide')
  }
})