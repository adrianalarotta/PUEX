<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo de Formulario</title>
    <style>
        .error {
            color: red;
        }
        .error-border {
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <h1>Ejemplo de Formulario</h1>

    <form method="POST" action="/submit" id="myForm" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="selectOption">Seleccionar 1 o 2:</label>
            <select id="selectOption" name="selectOption">
                <option value="">Seleccione</option>
                <option value="1">Opción 1</option>
                <option value="2">Opción 2</option>
            </select>
            <p class="error" id="selectError"></p>
        </div>

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name">
            <p class="error" id="nameError"></p>
        </div>

        <div>
            <label for="file">Subir archivo:</label>
            <input type="file" id="file" name="file">
            <p class="error" id="fileError"></p>
        </div>

        <button type="submit" id="submitButton">Enviar</button>
    </form>

    <script>
        document.getElementById('submitButton').addEventListener('click', function(e) {
            e.preventDefault(); // Evita enviar el formulario al hacer clic

            var selectOption = document.getElementById('selectOption');
            var nameInput = document.getElementById('name');
            var fileInput = document.getElementById('file');

            var selectError = document.getElementById('selectError');
            var nameError = document.getElementById('nameError');
            var fileError = document.getElementById('fileError');

            // Reiniciar los estilos de error
            selectOption.classList.remove('error-border');
            nameInput.classList.remove('error-border');
            fileInput.classList.remove('error-border');
            selectError.innerText = "";
            nameError.innerText = "";
            fileError.innerText = "";

            var isValid = true;

            // Validar la selección
            if (selectOption.value === "") {
                selectOption.classList.add('error-border');
                selectError.innerText = "Por favor, haga una selección.";
                isValid = false;
            }

            // Validar el nombre
            if (nameInput.value === "") {
                nameInput.classList.add('error-border');
                nameError.innerText = "Este campo es requerido.";
                isValid = false;
            }

            // Validar el archivo
            if (fileInput.value === "") {
                fileInput.classList.add('error-border');
                fileError.innerText = "Por favor, adjunte un archivo.";
                isValid = false;
            }

            if (isValid) {
                // Si todos los campos son válidos, enviar el formulario
                document.getElementById('myForm').submit();
            }
        });
    </script>
</body>
</html>