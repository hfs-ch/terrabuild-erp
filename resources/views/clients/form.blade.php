<div class="mb-3">
    <label>Nom</label>

    <input type="text"
           name="nom"
           class="form-control"
           value="{{ old('nom',$client->nom ?? '') }}">
</div>

<div class="mb-3">
    <label>Téléphone</label>

    <input type="text"
           name="telephone"
           class="form-control"
           value="{{ old('telephone',$client->telephone ?? '') }}">
</div>

<div class="mb-3">
    <label>Email</label>

    <input type="email"
           name="email"
           class="form-control"
           value="{{ old('email',$client->email ?? '') }}">
</div>

<div class="mb-3">
    <label>Adresse</label>

    <textarea name="adresse" class="form-control">{{ old('adresse',$client->adresse ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Ville</label>

    <input type="text"
           name="ville"
           class="form-control"
           value="{{ old('ville',$client->ville ?? '') }}">
</div>