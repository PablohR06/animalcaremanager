<div>
    <h2>Estadísticas del Sistema</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Animales</h5>
                    <p class="card-text">{{ $totalAnimales }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Adopciones</h5>
                    <p class="card-text">{{ $totalAdopciones }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Donaciones</h5>
                    <p class="card-text">${{ $totalDonaciones }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total de Seguimientos</h5>
                    <p class="card-text">{{ $totalSeguimientos }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
