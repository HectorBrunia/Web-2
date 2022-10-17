<div class="row justify-content-center ">
    <div class="col-5 justify-content-center">
        <form action="add" method="POST" enctype="multipart/form-data" class="my-4">
            <div class="form-group text-center">
                <p>Agregar Telefono</p>
                <label>Modelo</label>
                <input name="model" size="100" type="text" class="form-control">
                <label>Memory</label>
                <input name="memory" type="text" class="form-control">
                <label>Display</label>
                <textarea name="display" type="text"  class="form-control" rows="3"></textarea>
                <label>GPU/CPU</label>
                <input name="cpugpu" type="text" class="form-control">
                <label>Camara</label>
                <textarea name="camera" type="text" class="form-control" rows="3"></textarea>
                <label>Marca</label>
                <select  name="id_brand" class="form-select" aria-label="Default select example" >
                {foreach from=$brands item=$brand} 
                    <option  value="{$brand->id_brand}">{$brand->brand_name}</option>
                {/foreach}
                </select>
                <label>Imagen</label>
                <input type="File" class="form-control" name="imagen">
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </div>
        </form>
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
        <table class='table table-bordered text-center' >
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