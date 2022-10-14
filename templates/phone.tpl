{include file="header.tpl"}
<div class="m-5 row justify-content-center bg-dark text-white">
    <div class="m-2 col-4 justify-content-center">
    {if isset($phone->img)}
        <img width="500" class="icon img-thumbnail" src="{$phone->img}"/>
    {/if}
    </div>
    <div class="m-2 col-4 justify-content-center ">
        <div class="form-group text-center">
            <h4>Modelo</h4>
            <p>{$phone->model}</p>
            <h4>Memory</h4>
            <p>{$phone->memory}</p>
            <h4>Display</h4>
            <p>{$phone->display}</p>
            <h4>GPU/CPU</h4>
            <p>{$phone->cpugpu}</p>
            <h4>Camara</h4>
            <p>{$phone->camera}</p>
            <h4>Marca</h4>
            <p>{$phone->brand}</p>
        </div>
    </div>
</div>
{include file="footer.tpl"}