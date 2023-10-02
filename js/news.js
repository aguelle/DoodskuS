const articleTitle = document.querySelector("#article-title");
const articleDescr = document.querySelector("#article-description");

document.querySelectorAll(".thumbs-img").forEach((img) => {
  document
    .querySelectorAll("#gallery-thumbs img[data-title]")
    .forEach((img) => {
      img.addEventListener("click", function () {
        document.getElementById("article-img").src = this.src;
        articleTitle.innerText = this.dataset.title;
        articleDescr.innerText = this.dataset.description;
        showImage({
          src: this.src,
          title: this.dataset.title,
          description: this.dataset.description,
        });
      });
    });
});

function showImage(imageData) {
  document.getElementById("article-img").src = imageData.src;
  document.querySelector("#aritcle-title").innerText = imageData.title;
  document.querySelector("#article-description").innerText =
    imageData.description;
}

const btnUp = document.querySelector('.btn-up');
const btnDown = document.querySelector('.btn-down');

btnUp.addEventListener('click', function(){
  console.log("btnNews")})

btnDown.addEventListener('click', function(){
  console.log("btnDown")})

  // showImage({
    // src: "article-img".src,
    // title: "article-title".dataset.title,
    // description: "article-descritption".dataset.description,
  // });
// })
