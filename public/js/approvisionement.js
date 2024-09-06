
let boutton_ajouter1=document.getElementById("btn_ajouter");
let nbligne1=0;
boutton_ajouter1.addEventListener("click",ajouterLigneApp);
let element_produit1=document.getElementById("produit_id");

let element_date_livraison=document.getElementById("date_id")
let element_quantite1=document.getElementById("quantite_id");
let tableau_ligne_app=document.getElementById("tableau_lignes_approvisionements");

function supprimerLigneApprovisionement(id_ligne_tableau){
    const ligne = document.getElementById(id_ligne_tableau);
    ligne.remove();
}

function editerLigneApprovisionement(id_ligne_tableau){
    const ligne = document.getElementById(id_ligne_tableau);
}


function creerLigneApp(produit,quantite,date) {
    nbligne1+=1;
    return `<tr id="ligne_app_${nbligne1}" class="bg-gray-100">
        <td class="py-3 px-6">
        ${JSON.parse(produit.value).libelle}
        </td>
        <td class="py-3 px-6">
        ${date.value}
        </td>
        <td class="py-3 px-6">
        ${quantite.value}
        </td>
        <td class="py-3 px-6">
            <a>
                <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md" onclick="editerLigneApprovisionement(ligne_app_${nbligne1})">Editer</button>
            </a>
            </a>
            <a>
                <button class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md" onclick="event.preventDefault();supprimerLigneApprovisionement('ligne_app_${nbligne1}')">Supprimer</button>
            </a>
        </td>
    </tr>`


}

function ajouterLigneApp(){
    tableau_ligne_app.innerHTML += creerLigne(element_produit1,element_quantite1,element_date_livraison);
}



