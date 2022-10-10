{include file="header.tpl"}
<div class=" row justify-content-center ">
    <div class="col-6 justify-content-center">
        <img class="icon img-thumbnail" src="data:image/jpeg;base64,{base64_encode($phone->img)}"/>
    </div>
    <div class="col-6 justify-content-center">
        <form action="editphone/{$phone->id}" method="POST" enctype="multipart/form-data" class="my-4">
            <div class=" row justify-content-center text-center">
                <p>Agregar Telefono</p>
                <div class="col-auto justify-content-center">
                    <div class="form-group text-center ">
                        <label>Modelo</label>
                        <input name="model" type="text" class="form-control" placeholder="{$phone->model}">
                        <label>Memory</label>
                        <input name="memory" type="text" class="form-control" placeholder="{$phone->memory}">
                        <label>Display</label>
                        <input name="display" type="text" class="form-control" placeholder="{$phone->display}">
                        <label>GPU/CPU</label>
                        <input name="cpugpu" type="text" class="form-control" placeholder="{$phone->cpugpu}">
                        <label>Camara</label>
                        <input name="camera" type="text" class="form-control" placeholder="{$phone->camera}">
                        <label>id_marca</label>
                        <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <input name="id_brand" type="text" class="form-control" placeholder="{$phone->brand}">
                    </div>
                </div>
                <label>Imagen</label>
                <input type="File" class="form-control" name="imagen">
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </div>
        </form>
    </div>
</div>
{include file="footer.tpl"}