<div class="mb-3">
    <label class="form-label">Employé</label>

    <select name="employe_id" class="form-control" required>

        @foreach($employes as $employe)

            <option value="{{ $employe->id }}"
                @selected(old('employe_id', $salaire->employe_id ?? '') == $employe->id)>

                {{ $employe->nom }}

            </option>

        @endforeach

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Mois</label>

    <input
        type="text"
        name="mois"
        class="form-control"
        placeholder="Ex : Juillet 2026"
        value="{{ old('mois', $salaire->mois ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label class="form-label">Salaire de base</label>

    <input
        type="number"
        step="0.01"
        id="base_salaire"
        name="base_salaire"
        class="form-control"
        value="{{ old('base_salaire', $salaire->base_salaire ?? 0) }}"
        required>
</div>

<div class="mb-3">
    <label class="form-label">Prime</label>

    <input
        type="number"
        step="0.01"
        id="prime"
        name="prime"
        class="form-control"
        value="{{ old('prime', $salaire->prime ?? 0) }}">
</div>

<div class="mb-3">
    <label class="form-label">Déductions</label>

    <input
        type="number"
        step="0.01"
        id="deductions"
        name="deductions"
        class="form-control"
        value="{{ old('deductions', $salaire->deductions ?? 0) }}">
</div>

<div class="mb-3">
    <label class="form-label">Net à payer</label>

    <input
        type="number"
        step="0.01"
        id="net_a_payer"
        name="net_a_payer"
        class="form-control"
        value="{{ old('net_a_payer', $salaire->net_a_payer ?? 0) }}"
        readonly>
</div>

<div class="mb-3">
    <label class="form-label">Statut</label>

    <select name="statut" class="form-control">

        <option value="En attente"
            @selected(old('statut', $salaire->statut ?? '') == 'En attente')>
            En attente
        </option>

        <option value="Payé"
            @selected(old('statut', $salaire->statut ?? '') == 'Payé')>
            Payé
        </option>

        <option value="Différé"
            @selected(old('statut', $salaire->statut ?? '') == 'Différé')>
            Différé
        </option>

    </select>
</div>

<button class="btn btn-success">
    <i class="fas fa-save"></i>
    Enregistrer
</button>

<a href="{{ route('salaires.index') }}" class="btn btn-secondary">
    Retour
</a>

<script>

function calculSalaire(){

    let base = parseFloat(document.getElementById('base_salaire').value) || 0;

    let prime = parseFloat(document.getElementById('prime').value) || 0;

    let deductions = parseFloat(document.getElementById('deductions').value) || 0;

    document.getElementById('net_a_payer').value =
        (base + prime - deductions).toFixed(2);

}

document.addEventListener('input', calculSalaire);

calculSalaire();

</script>