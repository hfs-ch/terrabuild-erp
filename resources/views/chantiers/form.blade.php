<div class="mb-3">
    <label class="form-label">Référence</label>
    <input type="text"
           name="reference"
           class="form-control"
           value="{{ old('reference', $chantier->reference ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Nom du chantier</label>
    <input type="text"
           name="nom"
           class="form-control"
           value="{{ old('nom', $chantier->nom ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Adresse</label>
    <textarea
        name="adresse"
        class="form-control"
        rows="3"
        required>{{ old('adresse', $chantier->adresse ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Projet</label>

    <select name="projet_id" class="form-control" required>

        <option value="">Choisir un projet</option>

        @foreach($projets as $projet)

            <option
                value="{{ $projet->id }}"
                @selected(old('projet_id', $chantier->projet_id ?? '')==$projet->id)
            >
                {{ $projet->nom }}
            </option>

        @endforeach

    </select>

</div>

<div class="row">

    <div class="col-md-6">

        <label>Date début</label>

        <input
            type="date"
            name="date_debut"
            class="form-control"
            value="{{ old('date_debut', $chantier->date_debut ?? '') }}"
            required>

    </div>

    <div class="col-md-6">

        <label>Date fin</label>

        <input
            type="date"
            name="date_fin"
            class="form-control"
            value="{{ old('date_fin', $chantier->date_fin ?? '') }}">

    </div>

</div>

<br>

<div class="row">

    <div class="col-md-6">

        <label>Budget</label>

        <input
            type="number"
            step="0.01"
            name="budget"
            class="form-control"
            value="{{ old('budget', $chantier->budget ?? '') }}"
            required>

    </div>

    <div class="col-md-6">

        <label>Statut</label>

        <select name="statut" class="form-control">

            <option value="En préparation"
                @selected(old('statut', $chantier->statut ?? '')=='En préparation')>

                En préparation

            </option>

            <option value="En cours"
                @selected(old('statut', $chantier->statut ?? '')=='En cours')>

                En cours

            </option>

            <option value="Terminé"
                @selected(old('statut', $chantier->statut ?? '')=='Terminé')>

                Terminé

            </option>

            <option value="Suspendu"
                @selected(old('statut', $chantier->statut ?? '')=='Suspendu')>

                Suspendu

            </option>

        </select>

    </div>

</div>

<br>

<button class="btn btn-success">

    <i class="fas fa-save"></i>

    Enregistrer

</button>

<a href="{{ route('chantiers.index') }}"
   class="btn btn-secondary">

    Retour

</a>