const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('contrasena');

        togglePassword.addEventListener('click', function () {
            // Alternar el tipo de input entre "password" y "text"
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            // Alternar el ícono entre candado cerrado y abierto
            togglePassword.name = type === 'password' ? 'lock-closed-outline' : 'lock-open-outline';
        });