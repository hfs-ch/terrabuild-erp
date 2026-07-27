<div class="mb-3">

    <label class="form-label">Matériel</label>

    <select name="materiel_id" class="form-control" required>

        <option value="">-- Choisir un matériel --</option>

        @foreach($materiels as $materiel)

            <option
                value="{{ $materiel->id }}"
                @selected(old('materiel_id', $stock->materiel_id ?? '') == $materiel->id)>

                {{ $materiel->nom }}

            </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label class="form-label">Type</label>

    <select name="type" class="form-control">

        <option value="Entrée"
            @selected(old('type', $stock->type ?? '') == 'Entrée')>

            Entrée

        </option>

        <option value="Sortie"
            @selected(old('type', $stock->type ?? '') == 'Sortie')>

            Sortie

        </option>

    </select>

</div>

<div class="mb-3">

    <label class="form-label">Quantité</label>

    <input
        type="number"
        name="quantite"
        class="form-control"
        value="{{ old('quantite', $stock->quantite ?? '') }}"
        required>

</div>

<div class="mb-3">

    <label class="form-label">Date du mouvement</label>

    <input
        type="date"
        name="date_mouvement"
        class="form-control"
        value="{{ old('date_mouvement', $stock->date_mouvement ?? date('Y-m-d')) }}"
        required>

</div>

<div class="mb-3">

    <label class="form-label">Référence</label>

    <input
        type="text"
        name="reference"
        class="form-control"
        value="{{ old('reference', $stock->reference ?? '') }}">

</div>

<div class="mb-3">

    <label class="form-label">Observation</label>

    <textarea
        name="observation"
        class="form-control"
        rows="4">{{ old('observation', $stock->observation ?? '') }}</textarea>

</div>

<button class="btn btn-success">

    <i class="fas fa-save"></i>

    Enregistrer

</button>

<a href="{{ route('stocks.index') }}"
   class="btn btn-secondary">

    Retour

</a>