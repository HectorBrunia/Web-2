{include file="header.tpl"}
<div class=" row justify-content-center ">
    <div class="col-5 justify-content-center">
        <form action="add" method="POST" enctype="multipart/form-data" class="my-4">
            <div class=" row justify-content-center text-center">
                <p>Agregar Telefono</p>
                <div class="col-auto justify-content-center">
                    <div class="form-group text-center ">
                        <label>Modelo</label>
                        <input name="model" type="text" class="form-control">
                        <label>Memory</label>
                        <input name="memory" type="text" class="form-control">
                        <label>Display</label>
                        <input name="display" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-auto justify-content-center">
                    <div class="form-group text-center">
                        <label>GPU/CPU</label>
                        <input name="cpugpu" type="text" class="form-control">
                        <label>Camara</label>
                        <input name="camera" type="text" class="form-control">
                        <label>Marca</label>
                        <select name="id_brand" class="form-select" aria-label="Default select example">
                        <option selected>Selecionar Marca</option>
                        {foreach from=$brands item=$brand} 
                            <option value="{$brand->id_brand}">{$brand->brand_name}</option>
                        {/foreach}
                        </select>
                    </div>
                </div>
                <label>Imagen</label>
                <input type="File" class="form-control" name="imagen">
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </div>
        </form>
        <table class='table table-bordered text-center'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>id</th>
                    <th scope='col'>Modelo</th>
                    <th scope='col'>Marca</th>
                    <th scope='col'></th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$phones item=$phone} 
                <tr>
                    <td>{$phone->id}</td>
                    <td>{$phone->model}</td>
                    <td>{$phone->brand}</td>
                    <td><a href='delete/{$phone->id}' type='button' class='btn btn-danger'>Borrar</a></td>
                    <td><a href='formedit/{$phone->id}' type='button' class='btn btn-warning'>editar</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-5 justify-content-center">
        <form action="add_brand" method="POST" class="my-4">
            <div class="form-group text-center">
                <p> Agragar nueva Marca</p>
                <label>Marca</label>
                <input name="brand" type="text" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </div>
        </form>
        <table class='table table-bordered text-center '>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>id</th>
                    <th scope='col'>Marca</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$brands item=$brand} 
                    <tr>
                        <td>{$brand->id_brand}</td>
                        <td>{$brand->brand_name}</td>
                        <td><a href='delete_brand/{$brand->id_brand}' type='button' class='btn btn-danger'>Borrar</a></td>
                        <td>
                            <form action="edit_brand/{$brand->id_brand}" method="POST" class="my-4">
                                <input name="brand_name" type="text" class="form-control">
                                <button type="submit" class="btn btn-warning mt-2">editar</button>
                            </form>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
{include file="footer.tpl"}