
let boutton_ajouter=document.getElementById("btn_ajouter");
let nbligne=0;
boutton_ajouter.addEventListener("click",ajouterLigne);
let element_produit=document.getElementById("produit_id");


let element_quantite=document.getElementById("quantite_id");
let tableau_ligne_cmd=document.getElementById("tableau_lignes_commandes");

function supprimerLigneCommande(id_ligne_tableau){
    const ligne = document.getElementById(id_ligne_tableau);
    ligne.remove();
}

function editerLigneCommande(id_ligne_tableau){
    const ligne = document.getElementById(id_ligne_tableau);
}


function creerLigne(produit,quantite) {
    nbligne+=1;
    return `<tr id="ligne_cmd_${nbligne}" class="bg-gray-100">
        <td class="py-3 px-6">
        ${JSON.parse(produit.value).libelle}
        </td>
        <td class="py-3 px-6">
        ${quantite.value}
        </td>
        <td class="py-3 px-6">
        ${quantite.value * JSON.parse(produit.value).prix_unitaire}
        </td>
        <td class="py-3 px-6">
            <a>
                <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md" onclick="editerLigneCommande(ligne_cmd_${nbligne})">Editer</button>
            </a>
            </a>
            <a>
                <button class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md" onclick="event.preventDefault();supprimerLigneCommande('ligne_cmd_${nbligne}')">Supprimer</button>
            </a>
        </td>
    </tr>`


}

function ajouterLigne(){
    tableau_ligne_cmd.innerHTML += creerLigne(element_produit,element_quantite);
}



