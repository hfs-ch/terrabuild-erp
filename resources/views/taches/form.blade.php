<div class="mb-3">
    <label class="form-label">Titre</label>
    <input type="text" name="titre" class="form-control" value="{{ old('titre', $tache->titre ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $tache->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Chantier</label>
    <select name="chantier_id" class="form-control">
        <option value="">-- Aucun --</option>
        @foreach($chantiers as $chantier)
            <option value="{{ $chantier->id }}" @selected(old('chantier_id', $tache->chantier_id ?? '') == $chantier->id)>{{ $chantier->nom }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Employé</label>
    <select name="employe_id" class="form-control">
        <option value="">-- Aucun --</option>
        @foreach($employes as $employe)
            <option value="{{ $employe->id }}" @selected(old('employe_id', $tache->employe_id ?? '') == $employe->id)>{{ $employe->nom }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Date début</label>
    <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $tache->date_debut?->format('Y-m-d') ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Date fin</label>
    <input type="date" name="date_fin" class="form-control" value="{{ old('date_fin', $tache->date_fin?->format('Y-m-d') ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Statut</label>

    <select name="statut" class="form-control">

        <option value="À faire"
            @selected(old('statut',$tache->statut ?? '')=='À faire')>
            À faire
        </option>

        <option value="En cours"
            @selected(old('statut',$tache->statut ?? '')=='En cours')>
            En cours
        </option>

        <option value="Terminée"
            @selected(old('statut',$tache->statut ?? '')=='Terminée')>
            Terminée
        </option>

        <option value="Annulée"
            @selected(old('statut',$tache->statut ?? '')=='Annulée')>
            Annulée
        </option>

    </select>
</div>
<div class="mb-3">
    <label class="form-label">Priorité</label>

    <select name="priorite" class="form-control">

        <option value="Basse"
            @selected(old('priorite',$tache->priorite ?? '')=='Basse')>
            Basse
        </option>

        <option value="Moyenne"
            @selected(old('priorite',$tache->priorite ?? '')=='Moyenne')>
            Moyenne
        </option>

        <option value="Haute"
            @selected(old('priorite',$tache->priorite ?? '')=='Haute')>
            Haute
        </option>

    </select>
</div>
<button class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
<a href="{{ route('taches.index') }}" class="btn btn-secondary">Retour</a>
