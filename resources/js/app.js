import Dropzone from 'dropzone';


Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone',{
    dicDefaultMessage: 'Sube aqui tu Imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dicrRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on("success", function (file, response) {
    console.log(response.imagen);
    document.querySelector('[name="imagen"]').value = response.imagen;
})

dropzone.on("removedfile", function() {});

