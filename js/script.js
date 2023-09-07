// 1.récupérer les données json

async function fetchMerchData(url) {
  try {
    const response = await fetch(url);
    return await response.json();
  } catch (e) {
    console.error("Impossible de charger les données : " + e);
  }
}

fetchMerchData("datas/merch.json").then(displayProducts);

// 2.display on the page

function displayProducts(products) {
  const productsContainer = document.getElementById("products-container");
  for (const product of products) {
    productsContainer.appendChild(createProductElement(product));
  }
}

function displayProducts(products) {
  document
    .getElementById("products-container")
    .append(...products.map(createProductElement));
}

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
