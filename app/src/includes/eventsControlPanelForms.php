<div class='modalWindow' id='modalWindowEvent'>
    <form id='recordFormEvent' class='recordForm' action='/mesonmontesdetoledo.com/app/src/controllers/updateEventController.php' method='POST' enctype='multipart/form-data'>
        <div id='formCenterContainer'>
            <label for="inputNameEvent">Nombre del evento
                <input type='text' value='' id='inputNameEvent' name='inputNameEvent' required>
            </label>
            <label for="inputImgEvent"></label>
            <input type="file" id='inputImgEvent' name='inputImgEvent'>
            <input type="hidden" name="MAX_FILE_SIZE" value="200000">
        </div>

        <input type='hidden' value='' id='inputIdEvent' name='inputIdEvent'>

        <div id='inputSubmitContainer'>
            <input type='submit' id='inputSubmitEvents' class='inputSubmit' value='Añadir'>
        </div>
    </form>
</div>