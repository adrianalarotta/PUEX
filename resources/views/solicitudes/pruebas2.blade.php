<script>
    function mostrartiposolicitud() {
        var tipoSolicitud = document.getElementById('tipo_solicitud');
        var tipoSolicitudError = document.getElementById('tipoSolicitudError');

        // Reiniciar los estilos de error
        tipoSolicitud.classList.remove('error-border');
        tipoSolicitudError.innerText = "";

        // Validar la selección
        if (tipoSolicitud.value === "") {
            tipoSolicitud.classList.add('error-border');
            tipoSolicitudError.innerText = "Por favor, seleccione un tipo de solicitud.";
            isValid = false;
        }
    }

    document.getElementById('submitButton').addEventListener('click', function(e) {
        e.preventDefault(); // Evita enviar el formulario al hacer clic

        var selectOption = document.getElementById('selectOption');
        var nameInput = document.getElementById('name');
        var fileInput = document.getElementById('file');
        var tipoSolicitud = document.getElementById('tipo_solicitud');

        var selectError = document.getElementById('selectError');
        var nameError = document.getElementById('nameError');
        var fileError = document.getElementById('fileError');
        var tipoSolicitudError = document.getElementById('tipoSolicitudError');

        // Reiniciar los estilos de error
        selectOption.classList.remove('error-border');
        nameInput.classList.remove('error-border');
        fileInput.classList.remove('error-border');
        tipoSolicitud.classList.remove('error-border');
        selectError.innerText = "";
        nameError.innerText = "";
        fileError.innerText = "";
        tipoSolicitudError.innerText = "";

        var isValid = true;

        // Validar la selección del primer formulario
        if (selectOption.value === "") {
            selectOption.classList.add('error-border');
            selectError.innerText = "Por favor, haga una selección.";
            isValid = false;
        }

        // Validar el nombre del primer formulario
        if (nameInput.value === "") {
            nameInput.classList.add('error-border');
            nameError.innerText = "Este campo es requerido.";
            isValid = false;
        }

        // Validar el archivo del primer formulario
        if (fileInput.value === "") {
            fileInput.classList.add('error-border');
            fileError.innerText = "Por favor, adjunte un archivo.";
            isValid = false;
        }

        // Validar la selección de tipo de solicitud
        if (tipoSolicitud.value === "") {
            tipoSolicitud.classList.add('error-border');
            tipoSolicitudError.innerText = "Por favor, seleccione un tipo de solicitud.";
            isValid = false;
        }

        if (isValid) {
            // Si todos los campos son válidos, enviar el formulario
            document.getElementById('myForm').submit();
        }
    });
</script>
