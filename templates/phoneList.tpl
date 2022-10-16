<div class='m-2 row justify-content-center'>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Marcas
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="home">Todas</a></li>
                {foreach from=$brands item=$brand} 
                    <li><a class="dropdown-item" href="listar/{$brand->id_brand}">{$brand->brand_name}</a></li>
                {/foreach}
            </ul>
        </div>
        <table class='table table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'></th>
                    <th scope='col'>Modelo</th>
                    <th scope='col'>Memoria</th>
                    <th scope='col'>Pantalla</th>
                    <th scope='col'>GPU/CPU</th>
                    <th scope='col'>Camara</th>
                    <th scope='col'>Marca</th>
                </tr>
            </thead>
            <tbody>
            {if $id}
                {foreach from=$phones item=$phone} 
                    {if $phone->id_brand == $id}
                        <tr>
                            <td> 
                            {if isset($phone->img)}
                                <img width="500" class="icon img-thumbnail" src="{$phone->img}"/>
                            {/if}</td>
                                <td> <a href="viewphone/{$phone->id}"> {$phone->model} </a></td>
                                <td>{$phone->memory}</td>
                                <td>{$phone->display}</td>
                                <td>{$phone->cpugpu}</td>
                                <td>{$phone->camera}</td>
                                <td>{$phone->brand}</td>
                            {if $loggedin == true}
                                <td><a href='delete/{$phone->id}' type='button' class='btn btn-danger'>Borrar</a></td>
                                <td><a href='formedit/{$phone->id}' type='button' class='btn btn-warning'>editar</a></td>
                            {/if}
                        </tr>
                    {/if}
                {/foreach}
            {else}
                {foreach from=$phones item=$phone} 
                    <tr>
                        <td> 
                        {if isset($phone->img)}
                            <img width="500" class="icon img-thumbnail" src="{$phone->img}"/>
                        {/if}</td>
                        <td> <a href="viewphone/{$phone->id}"> {$phone->model} </a></td>
                        <td>{$phone->memory}</td>
                        <td>{$phone->display}</td>
                        <td>{$phone->cpugpu}</td>
                        <td>{$phone->camera}</td>
                        <td>{$phone->brand}</td>
                        {if $loggedin == true}
                            <td><a href='delete/{$phone->id}' type='button' class='btn btn-danger'>Borrar</a></td>
                            <td><a href='formedit/{$phone->id}' type='button' class='btn btn-warning'>editar</a></td>
                        {/if}
                    </tr>
                {/foreach}
            {/if}
            </tbody> 
        </table>
        {if $loggedin == true}
            {include file="admin.tpl"}
        {/if}
</div>
{include file="footer.tpl"};