<div class=" row justify-content-center ">
    <div class="m-5 col-5 justify-content-center">
        {if isset($phone->img)}
            <img width="500" class="icon img-thumbnail" src="{$phone->img}"/>
        {/if}</td>
    </div>
    <div class=" col-auto justify-content-center">
        <form action="edit/{$phone->id}" method="POST" enctype="multipart/form-data" class="my-4">
            <p>Agregar Telefono</p>
            <div class="form-group text-center ">
                <label>Modelo</label>
                <input name="model" type="text" size="50"  class="form-control" placeholder="{$phone->model}">
                <label>Memory</label>
                <input name="memory" type="text" class="form-control" placeholder="{$phone->memory}">
                <label>Display</label>
                <textarea name="display" type="text"  class="form-control" placeholder="{$phone->display}" rows="3"></textarea>
                <label>GPU/CPU</label>
                <input name="cpugpu" type="text" required class="form-control" placeholder="{$phone->cpugpu}">
                <label>Camara</label>
                <textarea name="camera" type="text" class="form-control" placeholder="{$phone->camera}" rows="3"></textarea>
                <select name="id_brand" class="form-select" aria-label="Default select example" required>
                <option value=" ">Selecionar Marca</option>
                {foreach from=$brands item=$brand} 
                    <option value="{$brand->id_brand}">{$brand->brand_name}</option>
                {/foreach}
                </select>
                <label>Imagen</label>
                <input type="File" class="form-control" name="imagen">
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </div>
        </form>
    </div>
</div>
{include file="footer.tpl"}