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
