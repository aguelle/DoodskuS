import * as utils from './functions';

//Add product (a. Déclencher l’action côté client)
document.getElementById("addMerch").addEventListener("submit", function (event) {
  // console.log('coucou');
  
  
  event.preventDefault();
  // Check and validate data 
  // b. Collecter et valider les données
  const data = {
    action: "addMerch",
    token: utils.getToken(),
    text: this.querySelector('input[name="name_product"]').value,
    int: this.querySelector('input[name="price_product"]').value,
  };

  if (data.text.length < 1) {
    utils.displayError("❌Merci de saisir une adresse email valide.❌");
    return;
  }
  if (data.int.length < 1) {
    utils.displayError("❌Merci de saisir un prix correct.❌");
    return;
  }
  if (data.token.length < 1) {
    utils.displayError("Problème!");
    return;
  }
  
  // c. Effectuer une requête HTTP asynchrone en JavaScript (AJAX)
  utils.fetchApi("POST", data).then(responseApi => {
    // An error occurs, dispay error message
    if (!responseApi.result) {
      utils.displayError(responseApi.error);
      return;
    }
    utils.displayError("👍🏻Produit enregistré.🤘🏻");

  });
});
