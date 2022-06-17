import { object } from './fetch-api-states.js';

const cepPart1 = document.querySelector('input[name="cep1"]');
const cepPart2 = document.querySelector('input[name="cep2"]');
const rua = document.querySelector('input[name="street"]');
const bairro = document.querySelector('input[name="district"]');
const cidade = document.querySelector('input[name="city"]');

const setState = async (uf) => {
    const response = await fetch(object.apiIbgeStates);
    const states = await response.json();
    await states.forEach(state => {
        if(state.sigla === uf) {
            object.select.innerHTML = `<option>${state.nome}</option>`;
        }
    });
};

const fillAddress = async () => {
    const api = `https://viacep.com.br/ws/${cepPart1.value + cepPart2.value}/json/`;

    const response = await fetch(api, { mode: 'cors' });
    const address = await response.json();

    rua.value = address.logradouro;
    bairro.value = address.bairro;
    cidade.value = address.localidade;
    setState(address.uf);
}

cepPart2.addEventListener('keyup', () => {
    if(cepPart2.value.length === 3) {
        fillAddress();
    }
});
