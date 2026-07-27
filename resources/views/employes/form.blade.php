@csrf

<div class="row">

    <div class="col-md-6 mb-3">
        <label>Matricule</label>
        <input type="text"
               name="matricule"
               class="form-control"
               value="{{ old('matricule',$employe->matricule ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Poste</label>
        <input type="text"
               name="poste"
               class="form-control"
               value="{{ old('poste',$employe->poste ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Nom</label>
        <input type="text"
               name="nom"
               class="form-control"
               value="{{ old('nom',$employe->nom ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Prénom</label>
        <input type="text"
               name="prenom"
               class="form-control"
               value="{{ old('prenom',$employe->prenom ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Date de naissance</label>

        <input type="date"
               name="date_naissance"
               class="form-control"
               value="{{ old('date_naissance',$employe->date_naissance ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">

        <label>Sexe</label>

        <select name="sexe" class="form-control">

            <option value="">Choisir</option>

            <option value="Homme"
                {{ old('sexe',$employe->sexe ?? '')=='Homme' ? 'selected' : '' }}>
                Homme
            </option>

            <option value="Femme"
                {{ old('sexe',$employe->sexe ?? '')=='Femme' ? 'selected' : '' }}>
                Femme
            </option>

        </select>

    </div>

    <div class="col-md-6 mb-3">
        <label>Téléphone</label>
        <input type="text"
               name="telephone"
               class="form-control"
               value="{{ old('telephone',$employe->telephone ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email',$employe->email ?? '') }}">
    </div>

    <div class="col-md-12 mb-3">
        <label>Adresse</label>

        <textarea
            name="adresse"
            class="form-control">{{ old('adresse',$employe->adresse ?? '') }}</textarea>

    </div>

    <div class="col-md-6 mb-3">
        <label>Date d'embauche</label>

        <input type="date"
               name="date_embauche"
               class="form-control"
               value="{{ old('date_embauche',$employe->date_embauche ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Salaire</label>

        <input type="number"
               step="0.01"
               name="salaire"
               class="form-control"
               value="{{ old('salaire',$employe->salaire ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">

        <label>Statut</label>

        <select name="statut" class="form-control">

            <option value="Actif">Actif</option>

            <option value="Suspendu">Suspendu</option>

            <option value="Congé">Congé</option>

        </select>

    </div>

</div>

<button class="btn btn-success">
    Enregistrer
</button>

<a href="{{ route('employes.index') }}"
   class="btn btn-secondary">
    Retour
</a>