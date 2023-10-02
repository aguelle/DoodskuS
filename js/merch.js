// 1.recover data json

async function fetchMerchData(url) {
  try {
    const response = await fetch(url);
    return await response.json();
  } catch (e) {
    console.error("Impossible de charger les données : " + e);
  }
}

fetchMerchData("datas/merch.json").then(displayProducts);
;

let products = [];

// 2.display on the page

function displayProducts(products) {
  const productsContainer = document.getElementById("products-container");
  for (const product of products) {
    productsContainer.appendChild(createProductElement(product));
  }
};

function createProductElement(product) {
  // Copy template
  const productElement = document.importNode(
    document.getElementById("product-template").content,
    true
  );

  // Put the name
  productElement.querySelector(".product-ttl").textContent = product.name;

  // Put the price
  productElement.querySelector(".product-price").textContent = product.price;

  // Change image
  const img = productElement.querySelector(".product-img");
  img.src = product.image;
  img.alt = product.name;

  return productElement;
}

// Add function to get list of category merch .

// function getCategories() {
//   let listCategories = [];
//   products.forEach(product => {
//       product.categories.forEach(category => {
//           if (!listCategories.includes(category)) listCategories.push(category);
//       });
//   });
//   return listCategories;
// };


// Add function to display categories of merch
// function displayCategoriesProducts(categories) {
//   for (const category of categories) {
//       const newLi = document.createElement('li');
//       const newBtn = document.createElement('button');
//       newBtn.classList.add('nav-btn');
//       newBtn.textContent = category;
//       newLi.appendChild(newBtn);
//       document.querySelector('#nav-bar-list').appendChild(newLi);
//   }
// };

// function createCategoryElement(category, nb) {
//   // Copy template
//   const categoryElement = document.importNode(document.getElementById('catgory-template').content, true);
  
//   // Put the name
//   categoryElement.querySelector('.nav-btn').textContent = `${category} (${nb})`;
  
//   // Add style name attribute
// categoryElement.querySelector('.nav-btn').dataset.categoryName = category;
  
//   return categoryElement;
// }
