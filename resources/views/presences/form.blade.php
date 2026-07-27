<div class="mb-3">
    <label class="form-label">Employé</label>
    <select name="employe_id" class="form-control" required>
        @foreach($employes as $employe)
            <option value="{{ $employe->id }}" @selected(old('employe_id', $presence->employe_id ?? '') == $employe->id)>{{ $employe->nom }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Date</label>

    <input
        type="date"
        name="date_presence"
        class="form-control"
        value="{{ old('date_presence', isset($presence) && $presence->date_presence ? $presence->date_presence->format('Y-m-d') : '') }}"
        required>
</div>
<div class="mb-3">
    <label class="form-label">Heure d'entrée</label>
    <input type="time" name="heure_entree" class="form-control" value="{{ old('heure_entree', $presence->heure_entree ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Heure de sortie</label>
    <input type="time" name="heure_sortie" class="form-control" value="{{ old('heure_sortie', $presence->heure_sortie ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Statut</label>

    <select
        name="statut"
        class="form-control"
        required>

        <option value="Présent">Présent</option>

        <option value="Absent">Absent</option>

        <option value="Retard">Retard</option>

        <option value="Conge">Congé</option>

    </select>
</div>
<button class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
<a href="{{ route('presences.index') }}" class="btn btn-secondary">Retour</a>
