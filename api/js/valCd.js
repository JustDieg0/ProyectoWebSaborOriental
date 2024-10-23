document.addEventListener('DOMContentLoaded', function() {
    const nombreInput = document.getElementById('name');
    const tarjetaInput = document.getElementById('cardNumber');
    const fechaInput = document.getElementById('expiryDate');
    const cvvInput = document.getElementById('cvv');
    const nombreError = document.getElementById('nombreError');
    const tarjetaError = document.getElementById('tarjetaError');
    const fechaError = document.getElementById('fechaError');
    const submitBtn = document.getElementById('submitBtn');
    var nombreBool = false;
    var tarjetaBool = false;
    var fechaBool = false;
    var cvvBool = false;

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

    function validateTarjeta() {
        let value = tarjetaInput.value.replace(/\D/g, '');
        value = value.match(/.{1,4}/g)?.join(' ') || ''; 
        tarjetaInput.value = value;
        if(tarjetaInput.value.length == 19){
            tarjetaError.classList.add('hidden');
            tarjetaBool = true;
            return true
        }else{
            tarjetaError.classList.remove('hidden');
            tarjetaBool = false;
            return false
        }
    }

    function validateFecha() {
        let value = fechaInput.value.replace(/\D/g, '');
        if (value.length > 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        fechaInput.value = value;

        const [month, year] = fechaInput.value.split('/').map(Number);
        var titbool;
        if (month < 1 || month > 12) {
            titbool = false;
        }else{
            titbool = true;
        }
        if(fechaInput.value.length == 5 && titbool){
            fechaError.classList.add('hidden');
            fechaBool = true;
            return true
        }else{
            fechaError.classList.remove('hidden');
            fechaBool = false;
            return false
        }
    }

    function validateCvv() {
        let value = cvvInput.value.replace(/\D/g, '');
        if (value.length > 3) {
            value = value.substring(0, 3);
        }
        cvvInput.value = value;
        if(cvvInput.value.length == 3){
            cvvBool = true;
            return true
        }else{
            cvvBool = false;
            return false
        }
    }

    function validateForm() {
        if (nombreBool && tarjetaBool && fechaBool && cvvBool) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('bg-gray-500', 'cursor-not-allowed');
            submitBtn.classList.add('bg-orange-600', 'cursor-pointer','hover:bg-orange-700');
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.remove('bg-orange-500', 'cursor-pointer','hover:bg-orange-700');
            submitBtn.classList.add('bg-gray-600', 'cursor-not-allowed');
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
            case 'name':
                validateNombre();
                break;
            case 'cardNumber':
                validateTarjeta();
                break;
            case 'expiryDate':
                validateFecha();
                break;
            case 'cvv':
                validateCvv();
                break;
        }
    }

    // Ocultar los mensajes de error al cargar la página
    nombreError.classList.add('hidden');
    tarjetaError.classList.add('hidden');
    fechaError.classList.add('hidden');
    // Ocultar el botón de envío al cargar la página
    submitBtn.disabled = true;
    submitBtn.classList.add('bg-gray-500', 'cursor-not-allowed');

    // Agregar eventos de escucha para manejar la validación
    nombreInput.addEventListener('blur', handleBlur);
    nombreInput.addEventListener('input', handleInput);
    tarjetaInput.addEventListener('blur', handleBlur);
    tarjetaInput.addEventListener('input', handleInput);
    fechaInput.addEventListener('blur', handleBlur);
    fechaInput.addEventListener('input', handleInput);
    cvvInput.addEventListener('blur', handleBlur);
    cvvInput.addEventListener('input', handleInput);
});
