const stateSelect = document.getElementById('state');
const citySelect = document.getElementById('city');

var userStateValue = '';
var userCityValue = '';

const userState = document.getElementById('user_state');
if (userState) {
    userStateValue = userState.value;
}

const userCity = document.getElementById('user_city');
if (userCity) {
    userCityValue = userCity.value;
}

function loadStates(user_state = '', user_city = '') {
    fetch('https://brasilapi.com.br/api/ibge/uf/v1')
    .then(response => {
        if (!response.ok) {
            throw new Error(`Erro ao carregar estados: ${response.status}`);
        }
        return response.json();
    })
    .then(states => {
        states.sort((a, b) => a.nome.localeCompare(b.nome));
        states.forEach(state => {
            const option = document.createElement('option');
            option.value = state.sigla;
            option.textContent = state.nome;
            stateSelect.appendChild(option);
        });

        if (user_state) {
            stateSelect.value = user_state;
            loadCities(user_state, user_city);
        }
    })
    .catch(error => {
        console.error('Erro ao carregar estados:', error);
        stateSelect.innerHTML = '<option value="">Erro ao carregar estados</option>';
    });
}

function loadCities(uf, cityToSelect = '') {
    citySelect.innerHTML = '<option value="">Carregando...</option>';
    citySelect.disabled = true;

    fetch(`https://brasilapi.com.br/api/ibge/municipios/v1/${uf}`)
    .then(response => {
        if (!response.ok) {
            throw new Error(`Erro de rede ou estado inválido: ${response.status}`);
        }
        return response.json();
    })
    .then(cities => {
        if (!Array.isArray(cities)) {
            console.error('Resposta da API não é um array:', cities);
            throw new Error('Formato de resposta inesperado da API.');
        }

        citySelect.innerHTML = '<option value="">Selecione a Cidade</option>';
        cities.sort((a, b) => a.nome.localeCompare(b.nome));
        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city.nome;
            option.textContent = city.nome;
            citySelect.appendChild(option);
        });
        citySelect.disabled = false;

        if (cityToSelect) {
            citySelect.value = cityToSelect;
        }
    })
    .catch(error => {
        console.error('Erro ao carregar cidades:', error);
        citySelect.innerHTML = '<option value="">Erro ao carregar cidades</option>';
        citySelect.disabled = true;
    });
}

stateSelect.addEventListener('change', function() {
    const selectUf = this.value;
    if (selectUf) {
        loadCities(selectUf);
    } else {
        citySelect.innerHTML = '<option value="">Selecione a Cidade</option>';
        citySelect.disabled = true;
    }
});

loadStates(userStateValue, userCityValue);
