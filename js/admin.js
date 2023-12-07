import * as utils from './functions';
//-------------------------------------------------//
//Connect to the admin page (a. Déclencher l’action côté client)
//-------------------------------------------------//
document.getElementById('validate').addEventListener('click', function (event) {
  event.preventDefault();
  const data = {
      action: 'connexion',
      token: getToken(),
      email: document.getElementById('email').value,
      pwd: document.getElementById('pwd').value
  };
  fetchApi('POST', data)
      .then(data => {
          if (data['result'] && data['producer']) {
              document.location.replace('admin.php');
          }
          else if (data['result'] && data['manager']) {
              document.location.replace('manager.php');
          }
          else if (data['result']) {
              document.location.replace('member.php');
          }
          else {
              document.getElementById('notif-index').textContent = data['error'];
              setTimeout(() => {
                  document.getElementById('notif-index').textContent = '';
              }, 3000);
          };
      })
      .catch(error => {
          console.error("Error :", error);
      });
});

//-------------------------------------------------//
//Add product (a. Déclencher l’action côté client)
//-------------------------------------------------//
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
  utils.fetchApi("POST", data).then(responseApi => {
    // An error occurs, dispay error message
    if (!responseApi.result) {
      utils.displayError(responseApi.error);
      return;
    }
    utils.displayError("👍🏻Produit enregistré.🤘🏻");

  });
});
//-------------------------------------------------//
//Edit product (a. Déclencher l’action côté client)
//-------------------------------------------------//
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
    id: this.querySelector('#edit_product').value,

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
  utils.fetchApi("POST", data).then(responseApi => {
    // An error occurs, dispay error message
    if (!responseApi.result) {
      utils.displayError(responseApi.error);
      return;
    }
    utils.displayError("👍🏻Produit enregistré.🤘🏻");

  });
});

//-------------------------------------------------//
//Delete product (a. Déclencher l’action côté client)
//-------------------------------------------------//
document.getElementById("deleteMerch").addEventListener("submit", function (event) {
  // console.log('coucou');
    
  event.preventDefault();
  // Check and validate data 
  // b. Collecter et valider les données
  const data = {
    action: "deleteMerch",
    token: utils.getToken(),
    id: this.querySelector('#delete_product').value,
  };

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
    utils.displayError("👍🏻Produit supprimé.🤘🏻");

  });
});
