const input = document.getElementById('input');
    const contador = document.getElementById('span');
    const char = document.getElementById('h3');

    input.addEventListener('input', e => {
        if (input.value.length < 350) {
            contador.innerHTML = input.value.length;
        }
        else {
            contador.innerHTML = 'Max';
            input.value = input.value.substring(0, 350)
        }
    })