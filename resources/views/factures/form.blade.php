<div class="card mb-4">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Informations générales</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>Client</label>
                <select name="client_id" class="form-control">
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">
                            {{ $client->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Devis</label>
                <select name="devis_id" class="form-control">
                    <option value="">Aucun</option>
                    @foreach($devis as $d)
                        <option value="{{ $d->id }}">
                            {{ $d->reference }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Référence</label>
                <input type="text"
                       name="reference"
                       class="form-control"
                       required>
            </div>
            <div class="col-md-4">
                <label>Date d'émission</label>
                <input type="date"
                       name="date_emission"
                       class="form-control"
                       required>
            </div>
            <div class="col-md-4">
                <label>Date d'échéance</label>
                <input type="date"
                       name="date_echeance"
                       class="form-control"
                       required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Statut</label>
                <select name="statut" class="form-control">
                    <option value="Impayée">Impayée</option>
                    <option value="Partiellement payée">Partiellement payée</option>
                    <option value="Payée">Payée</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <strong>Lignes de facture</strong>
        <button
            type="button"
            class="btn btn-light btn-sm"
            onclick="ajouterLigne()">
            + Ajouter une ligne
        </button>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="tableFacture">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th width="120">Qté</th>
                    <th width="160">Prix HT</th>
                    <th width="120">TVA %</th>
                    <th width="180">Total</th>
                    <th width="80"></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <hr>
        <div class="row justify-content-end">
            <div class="col-md-4">
                <table class="table">
                    <tr>
                        <th>Sous Total HT</th>
                        <td>
                            <input
                                readonly
                                id="sousTotal"
                                class="form-control"
                                name="sous_total"
                                value="0">
                        </td>
                    </tr>
                    <tr>
                        <th>TVA</th>
                        <td>
                            <input
                                readonly
                                id="montantTVA"
                                class="form-control"
                                name="montant_tva"
                                value="0">
                        </td>
                    </tr>
                    <tr>
                        <th>Remise</th>
                        <td>
                            <input
                                id="remise"
                                class="form-control"
                                name="remise"
                                value="0">
                        </td>
                    </tr>
                    <tr class="table-success">
                        <th>TOTAL TTC</th>
                        <td>
                            <input
                                readonly
                                id="montantTTC"
                                class="form-control"
                                name="montant_ttc"
                                value="0">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<br>

<!-- Champs cachés pour le contrôleur -->
<input type="hidden" name="montant_ht" id="montantHTHidden">
<input type="hidden" name="montant_tva" id="montantTVAHidden">
<input type="hidden" name="montant_ttc" id="montantTTCHidden">

<button class="btn btn-success">
    <i class="fas fa-save"></i> Enregistrer
</button>

<script>
function ajouterLigne(){
    let tbody = document.querySelector("#tableFacture tbody");
    let tr = document.createElement("tr");
    tr.innerHTML = `
        <td>
            <input
                name="designation[]"
                class="form-control">
        </td>
        <td>
            <input
                type="number"
                name="quantite[]"
                value="1"
                class="form-control qte">
        </td>
        <td>
            <input
                type="number"
                step="0.01"
                name="prix_unitaire[]"
                value="0"
                class="form-control prix">
        </td>
        <td>
            <input
                type="number"
                step="0.01"
                name="tva[]"
                value="20"
                class="form-control tva">
        </td>
        <td>
            <input
                readonly
                name="total_ttc[]"
                class="form-control total">
        </td>
        <td>
            <button
                type="button"
                class="btn btn-danger"
                onclick="supprimerLigne(this)">
                X
            </button>
        </td>
    `;
    tbody.appendChild(tr);
    calcul();
}

function supprimerLigne(btn){
    btn.closest("tr").remove();
    calcul();
}

document.addEventListener("input", calcul);

function calcul(){
    let sous = 0;
    let tvaTotal = 0;

    document.querySelectorAll("#tableFacture tbody tr").forEach(function(tr){
        let qte = parseFloat(tr.querySelector(".qte").value) || 0;
        let prix = parseFloat(tr.querySelector(".prix").value) || 0;
        let tva = parseFloat(tr.querySelector(".tva").value) || 0;
        let ht = qte * prix;
        let ttc = ht + (ht * tva / 100);
        tr.querySelector(".total").value = ttc.toFixed(2);
        sous += ht;
        tvaTotal += ht * tva / 100;
    });

    let remise = parseFloat(document.getElementById("remise").value) || 0;

    document.getElementById("sousTotal").value = sous.toFixed(2);
    document.getElementById("montantTVA").value = tvaTotal.toFixed(2);
    document.getElementById("montantTTC").value = (sous + tvaTotal - remise).toFixed(2);

    // Mise à jour des champs cachés
    document.getElementById("montantHTHidden").value = sous.toFixed(2);
    document.getElementById("montantTVAHidden").value = tvaTotal.toFixed(2);
    document.getElementById("montantTTCHidden").value = (sous + tvaTotal - remise).toFixed(2);
}

// Ajouter une ligne par défaut
ajouterLigne();
</script>