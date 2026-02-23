//selectores
let catBtn = document.querySelector("#cat-fact");
let dogBtn = document.querySelector("#dog-image");
let catInfo = document.querySelector("#cat-info");
let dogInfo = document.querySelector("#dog-image-info");
let rickBtn = document.querySelector("#rick-people");
let ulPeople = document.querySelector("ul");

catBtn.addEventListener("click", function () {
  fetch("https://catfact.ninja/fact")
    .then((response) => response.json())
    .then((data) => {
      catInfo.textContent = data.fact;
    });
});

dogBtn.addEventListener("click", function () {
  fetch("https://dog.ceo/api/breeds/image/random")
    .then((response) => response.json())
    .then((data) => {
      dogInfo.src = data.message;
    });
});


//pp 15
rickBtn.addEventListener("click", function () {
  fetch("https://rickandmortyapi.com/api/character")
    .then((response) => response.json())
    .then((data) => {
      for (let element of data.results) {

        let li = document.createElement("li");
        li.textContent = element.name
        ulPeople.appendChild(li)
      }
    });
});
