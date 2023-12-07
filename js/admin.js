import * as utils from "./functions";

//-------------------------------------------------//
//------------------Add product--------------------//
//-------------------------------------------------//

// (a. Déclencher l’action côté client)
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
      utils.displayError("❌Merci de saisir un nom de produit valide.❌");
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
    utils.fetchApi("POST", data).then((responseApi) => {
      // An error occurs, dispay error message
      if (!responseApi.result) {
        utils.displayError(responseApi.error);
        return;
      }
      utils.displayError("👍🏻Produit enregistré.🤘🏻");
    });
  });

//-------------------------------------------------//
//----------------Edit product---------------------//
//-------------------------------------------------//

// (a. Déclencher l’action côté client)
document.getElementById("editMerch").addEventListener("submit", function (event) {
    // console.log('coucou');

    event.preventDefault();
    // Check and validate data
    // b. Collecter et valider les données
    const data = {
      action: "editMerch",
      token: utils.getToken(),
      text: this.querySelector('input[name="name_product"]').value,
      int: this.querySelector('input[name="price_product"]').value,
      id: this.querySelector("#edit_product").value,
    };

    if (data.text.length < 1) {
      utils.displayError("❌Merci de saisir un nom de produit valide.❌");
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
    utils.fetchApi("POST", data).then((responseApi) => {
      // An error occurs, dispay error message
      if (!responseApi.result) {
        utils.displayError(responseApi.error);
        return;
      }
      utils.displayError("👍🏻Produit enregistré.🤘🏻");
    });
  });

//-------------------------------------------------//
//--------------- Delete product ------------------//
//-------------------------------------------------//

// (a. Déclencher l’action côté client)
document.getElementById("deleteMerch").addEventListener("submit", function (event) {
    // console.log('coucou');

    event.preventDefault();
    // Check and validate data
    // b. Collecter et valider les données
    const data = {
      action: "deleteMerch",
      token: utils.getToken(),
      id: this.querySelector("#delete_product").value,
    };

    if (data.token.length < 1) {
      utils.displayError("Problème!");
      return;
    }

    // c. Effectuer une requête HTTP asynchrone en JavaScript (AJAX)
    utils.fetchApi("POST", data).then((responseApi) => {
      // An error occurs, dispay error message
      if (!responseApi.result) {
        utils.displayError(responseApi.error);
        return;
      }
      utils.displayError("👍🏻Produit supprimé.🤘🏻");
    });
  });
