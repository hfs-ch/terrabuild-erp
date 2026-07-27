<div class="card">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            Informations du devis
        </h5>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Client</label>

                <select name="client_id" class="form-control" required>

                    @foreach($clients as $client)

                        <option
                            value="{{ $client->id }}"
                            @selected(old('client_id', $devis->client_id ?? '') == $client->id)>

                            {{ $client->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Référence</label>

                <input
                    type="text"
                    name="reference"
                    class="form-control"
                    value="{{ old('reference',$devis->reference ?? '') }}"
                    required>

            </div>

        </div>


        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Date d'émission
                </label>

                <input
                    type="date"
                    name="date_emission"
                    class="form-control"
                    value="{{ old('date_emission',$devis->date_emission?->format('Y-m-d') ?? '') }}"
                    required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Date de validité
                </label>

                <input
                    type="date"
                    name="date_validite"
                    class="form-control"
                    value="{{ old('date_validite',$devis->date_validite?->format('Y-m-d') ?? '') }}"
                    required>

            </div>

        </div>


        <div class="row">

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Montant HT
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="montant_ht"
                    class="form-control"
                    value="{{ old('montant_ht',$devis->montant_ht ?? 0) }}"
                    required>

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    TVA
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="tva"
                    class="form-control"
                    value="{{ old('tva',$devis->tva ?? 20) }}"
                    required>

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Montant TTC
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="montant_ttc"
                    class="form-control"
                    value="{{ old('montant_ttc',$devis->montant_ttc ?? 0) }}"
                    required>

            </div>

        </div>


        <div class="mb-3">

            <label class="form-label">
                Statut
            </label>

            <select
                name="statut"
                class="form-control">

                <option
                    value="Soumis"
                    @selected(old('statut',$devis->statut ?? '')=='Soumis')>

                    Soumis

                </option>

                <option
                    value="Accepté"
                    @selected(old('statut',$devis->statut ?? '')=='Accepté')>

                    Accepté

                </option>

                <option
                    value="Refusé"
                    @selected(old('statut',$devis->statut ?? '')=='Refusé')>

                    Refusé

                </option>

            </select>

        </div>

    </div>

    <div class="card-footer">

        <button class="btn btn-success">

            <i class="fas fa-save"></i>

            Enregistrer

        </button>

        <a
            href="{{ route('devis.index') }}"
            class="btn btn-secondary">

            Retour

        </a>

    </div>

</div>