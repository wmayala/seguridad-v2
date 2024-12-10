<div>
    <div id="activity-card-front">
        @include('card.retired.front', ['data' => $data])
    </div>
    <div id="activity-card-back">
        @include('card.retired.back', ['data' => $data])
    </div>
    <button id="printButton">Imprimir</button>
</div>
