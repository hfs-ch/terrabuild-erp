<div class="mb-3">
    <label class="form-label">Référence</label>
    <input type="text"
           name="reference"
           class="form-control"
           value="{{ old('reference', $projet->reference ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Nom du projet</label>
    <input type="text"
           name="nom"
           class="form-control"
           value="{{ old('nom', $projet->nom ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description"
              class="form-control"
              rows="4">{{ old('description', $projet->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Client</label>

    <select name="client_id" class="form-control" required>

        <option value="">Sélectionner un client</option>

        @foreach($clients as $client)

            <option value="{{ $client->id }}"
                @selected(old('client_id', $projet->client_id ?? '') == $client->id)>

                {{ $client->nom }}

            </option>

        @endforeach

    </select>

</div>

<div class="row">

    <div class="col-md-6">

        <label>Date début</label>

        <input type="date"
               name="date_debut"
               class="form-control"
               value="{{ old('date_debut', $projet->date_debut ?? '') }}"
               required>

    </div>

    <div class="col-md-6">

        <label>Date fin</label>

        <input type="date"
               name="date_fin"
               class="form-control"
               value="{{ old('date_fin', $projet->date_fin ?? '') }}">

    </div>

</div>

<br>

<div class="row">

    <div class="col-md-6">

        <label>Budget (MAD)</label>

        <input type="number"
               step="0.01"
               name="budget"
               class="form-control"
               value="{{ old('budget', $projet->budget ?? '') }}"
               required>

    </div>

    <div class="col-md-6">

        <label>Statut</label>

        <select name="statut" class="form-control">

            <option value="En attente"
                @selected(old('statut', $projet->statut ?? '') == 'En attente')>
                En attente
            </option>

            <option value="En cours"
                @selected(old('statut', $projet->statut ?? '') == 'En cours')>
                En cours
            </option>

            <option value="Terminé"
                @selected(old('statut', $projet->statut ?? '') == 'Terminé')>
                Terminé
            </option>

            <option value="Suspendu"
                @selected(old('statut', $projet->statut ?? '') == 'Suspendu')>
                Suspendu
            </option>

        </select>

    </div>

</div>

<br>

<button class="btn btn-success">
    <i class="fas fa-save"></i> Enregistrer
</button>

<a href="{{ route('projets.index') }}" class="btn btn-secondary">
    Annuler
</a>