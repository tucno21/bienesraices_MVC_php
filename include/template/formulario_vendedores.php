<fieldset>
    <legend>Información General</legend>
    <label for="nombre">Nombre:</label>
    <input type="text" id="titulo" name="vendedor[nombre]" placeholder="Nombre del vendedor" value='<?php echo s($vendedor->nombre); ?>'>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="vendedor[apellidos]" placeholder="Apellidos" value='<?php echo s($vendedor->apellidos); ?>'>

    <label for="telefono">Telefono:</label>
    <input type="number" id="telefono" name="vendedor[telefono]" placeholder="Telefono" value='<?php echo s($vendedor->telefono); ?>'>

</fieldset>