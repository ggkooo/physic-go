document.addEventListener('DOMContentLoaded', function() {
    var cpfInput = document.getElementById('cpf');

    // Adiciona a máscara APENAS se o campo não for 'readonly'
    if (cpfInput && !cpfInput.readOnly) {
        cpfInput.addEventListener('input', function(e) {
            var value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
            var formattedValue = '';

            if (value.length > 0) {
                formattedValue = value.substring(0, 3);
                if (value.length > 3) {
                    formattedValue += '.' + value.substring(3, 6);
                }
                if (value.length > 6) {
                    formattedValue += '.' + value.substring(6, 9);
                }
                if (value.length > 9) {
                    formattedValue += '-' + value.substring(9, 11);
                }
            }

            e.target.value = formattedValue;
        });
    }

    var phoneInput = document.getElementById('phone');
    if (phoneInput) { // Para telefone, geralmente não é readonly, então não precisamos da verificação
        phoneInput.addEventListener('input', function(e) {
            var value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito
            var formattedValue = '';

            if (value.length > 0) {
                formattedValue = '(' + value.substring(0, 2); // DDD
                if (value.length > 2) {
                    formattedValue += ') ';
                    if (value.length > 10) { // Se tiver 11 dígitos (9º na frente)
                        formattedValue += value.substring(2, 3) + '.'; // Primeiro dígito (geralmente o 9)
                        formattedValue += value.substring(3, 7) + '-'; // 4 dígitos
                        formattedValue += value.substring(7, 11); // Últimos 4 dígitos
                    } else if (value.length > 6) { // Se tiver 8 ou 9 dígitos no número principal
                        formattedValue += value.substring(2, 6) + '-'; // 4 dígitos
                        formattedValue += value.substring(6, 10); // Últimos 4 dígitos
                    } else {
                        formattedValue += value.substring(2, 6); // Apenas os primeiros 4 ou menos
                    }
                }
            }
            e.target.value = formattedValue;
        });

            // Correção de cursor ao digitar com máscara
            phoneInput.addEventListener('blur', function(e) {
            // Ao sair do campo, se o valor for inválido, limpa (opcional, mas útil)
            var value = e.target.value.replace(/\D/g, '');
            if (value.length > 0 && value.length < 10) { // Menos de 10 dígitos (considerando DDD + 8 ou 9 dígitos)
                e.target.value = ''; // Limpa o campo se incompleto
            }
        });
    }
});        
