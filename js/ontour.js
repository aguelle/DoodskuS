// 1.récupérer les données json
async function ontourdata(url){
    try {
        const response = await fetch(url);
        return await response.json();
      } catch (e) {
        console.error("Impossible de charger les données : " + e);
      }
    };
    
    fetchOnTourData("datas/ontour.json").then(displayOnTour);
;

