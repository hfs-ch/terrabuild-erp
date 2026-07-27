<div class="mb-3">
    <label class="form-label">Nom de l'équipe</label>
    <input type="text"
           name="nom"
           class="form-control"
           value="{{ old('nom', $equipe->nom ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Chef d'équipe</label>
    <input type="text"
           name="chef_equipe"
           class="form-control"
           value="{{ old('chef_equipe', $equipe->chef_equipe ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea
        name="description"
        class="form-control"
        rows="4">{{ old('description', $equipe->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Chantier</label>

    <select
        name="chantier_id"
        class="form-control"
        required>

        <option value="">Choisir un chantier</option>

        @foreach($chantiers as $chantier)

            <option
                value="{{ $chantier->id }}"
                @selected(old('chantier_id', $equipe->chantier_id ?? '')==$chantier->id)>

                {{ $chantier->nom }}

            </option>

        @endforeach

    </select>
</div>

<button class="btn btn-success">
    <i class="fas fa-save"></i>
    Enregistrer
</button>

<a href="{{ route('equipes.index') }}"
   class="btn btn-secondary">

    Retour

</a>