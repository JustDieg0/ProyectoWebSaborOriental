document.addEventListener('DOMContentLoaded', function() {
    const nombreInput = document.getElementById('nombre');
    const correoInput = document.getElementById('correo');
    const contraseñaInput = document.getElementById('contraseña');
    const telefonoInput = document.getElementById('telefono');
    const DNIInput = document.getElementById('DNI');
    const nombreError = document.getElementById('nombreError');
    correoError = document.getElementById('correoError');
    const contraseñaError = document.getElementById('contraseñaError');
    const telefonoError = document.getElementById('telefonoError');
    const DNIError = document.getElementById('DNIError');
    const submitBtn = document.getElementById('submitBtn');
    const mayus = document.getElementById('mayus');
    const minus = document.getElementById('minus');
    const number = document.getElementById('number');
    const carac = document.getElementById('carac');
    var nombreBool = false;
    var correoBool = false;
    var contraseñaBool = false;
    var telefonoBool = false;
    var DNIBool = false;

    function validateNombre() {
        const regex = /^[a-zA-Z\s]+$/;
        if (regex.test(nombreInput.value)) {
            nombreError.classList.add('hidden');
            nombreBool = true;
            return true;
        } else {
            nombreError.classList.remove('hidden');
            nombreBool = false;
            return false;
        }
    }

    function validateCorreo() {
        if (correoInput.value.includes('@')) {
            correoError.classList.add('hidden');
            correoBool = true;
            return true;
        } else {
            correoError.classList.remove('hidden');
            correoBool = false;
            return false;
        }
    }

    function validateContraseña() {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        const regexmay = /^(?=.*[A-Z])/;
        const regexmin = /^(?=.*[a-z])/;
        const regexnum = /^(?=.*\d)/;
        const regexcarac = /^.{8,}$/;
        if(regexmay.test(contraseñaInput.value)){
            mayus.classList.add('text-pry-dark-brown');
        }else{
            mayus.classList.remove('text-pry-dark-brown');
        }

        if(regexmin.test(contraseñaInput.value)){
            minus.classList.add('text-pry-dark-brown');
        }else{
            minus.classList.remove('text-pry-dark-brown');
        }

        if(regexnum.test(contraseñaInput.value)){
            number.classList.add('text-pry-dark-brown');
        }else{
            number.classList.remove('text-pry-dark-brown');
        }

        if(regexcarac.test(contraseñaInput.value)){
            carac.classList.add('text-pry-dark-brown');
        }else{
            carac.classList.remove('text-pry-dark-brown');
        }

        if (regex.test(contraseñaInput.value)) {
            contraseñaError.classList.add('hidden');
            contraseñaBool = true;
            return true;
        } else {
            contraseñaError.classList.remove('hidden');
            contraseñaBool = false;
            return false;
        }
    }

    function validateTelefono() {
        const regex = /^\d{9}$/;
        if (regex.test(telefonoInput.value)) {
            telefonoError.classList.add('hidden');
            telefonoBool = true;
            return true;
        } else {
            telefonoError.classList.remove('hidden');
            telefonoBool = false;
            return false;
        }
    }

    function validateDNI() {
        const regex = /^\d{8}$/;
        if (regex.test(DNIInput.value)) {
            DNIError.classList.add('hidden');
            DNIBool = true;
            return true;
        } else {
            DNIError.classList.remove('hidden');
            DNIBool = false;
            return false;
        }
    }

    function validateForm() {

        if (nombreBool && correoBool && contraseñaBool && telefonoBool && DNIBool) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('bg-gray-500', 'cursor-not-allowed');
            submitBtn.classList.add('bg-orange-500', 'cursor-pointer');
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.remove('bg-orange-500', 'cursor-pointer');
            submitBtn.classList.add('bg-gray-500', 'cursor-not-allowed');
        }
    }

    function handleBlur(event) {
        const inputId = event.target.id;
        validateField(inputId);
        validateForm();
    }

    function handleInput(event) {
        const inputId = event.target.id;
        validateField(inputId);
        validateForm();
    }

    function validateField(inputId) {
        switch (inputId) {
            case 'nombre':
                validateNombre();
                break;
            case 'correo':
                validateCorreo();
                break;
            case 'contraseña':
                validateContraseña();
                break;
            case 'telefono':
                validateTelefono();
                break;
            case 'DNI':
                validateDNI();
                break;
            // Agregar validación para otros campos aquí si es necesario
        }
    }

    // Ocultar los mensajes de error al cargar la página
    nombreError.classList.add('hidden');
    // Ocultar el botón de envío al cargar la página
    submitBtn.disabled = true;
    submitBtn.classList.add('bg-gray-500', 'cursor-not-allowed');

    // Agregar eventos de escucha para manejar la validación
    nombreInput.addEventListener('blur', handleBlur);
    nombreInput.addEventListener('input', handleInput);
    correoInput.addEventListener('blur', handleBlur);
    correoInput.addEventListener('input', handleInput);
    contraseñaInput.addEventListener('blur', handleBlur);
    contraseñaInput.addEventListener('input', handleInput);
    telefonoInput.addEventListener('blur', handleBlur);
    telefonoInput.addEventListener('input', handleInput);
    DNIInput.addEventListener('blur', handleBlur);
    DNIInput.addEventListener('input', handleInput);
});

