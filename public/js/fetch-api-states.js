export const object = {
    select: document.querySelector('#state'),
    apiIbgeStates: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
    buildOptionElement: (state) => {
        const option = document.createElement('option');
        option.innerHTML = state.nome;
        object.select.appendChild(option);
    },
    populateStates: (states) => {
        states.forEach(state => {
            object.buildOptionElement(state);
        });
    }
};

(async () => {
    const response = await fetch(object.apiIbgeStates, { method: 'GET' });
    const states = await response.json();

    object.populateStates(states);
})();
