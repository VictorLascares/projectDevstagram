import Dropzone from 'dropzone';
if (document.querySelector('#dropzone')) {
    Dropzone.autoDiscover = false;
    const dropzone = new Dropzone('#dropzone',{
        dicDefaultMessage: 'Sube aqui tu Imagen',
        acceptedFiles: '.png, .jpg, .jpeg, .gif',
        addRemoveLinks: true,
        dicrRemoveFile: 'Borrar Archivo',
        maxFiles: 1,
        uploadMultiple: false,
        init: function () {
            if(document.querySelector('[name="imagen"]').value.trim()) {
                const imagenPublicada = {};
                imagenPublicada.size = 1234;
                imagenPublicada.name = document.querySelector('[name="imagen"]').value;
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/img/uploads/${imagenPublicada.name}`);
                imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
            }
        }
    });
    
    dropzone.on("success", function (file, response) {
        document.querySelector('[name="imagen"]').value = response.imagen;
    })
    
    dropzone.on("removedfile", function() {
        document.querySelector('[name="imagen"]').value = '';
    });
}

