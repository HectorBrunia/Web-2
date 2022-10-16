<div class='m-5 row justify-content-center br-darck'> 
    <div class='col-auto'>
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form method="POST" action="validate">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" required class="form-control" id="password" name="password">
                </div>
                {if $error} 
                    <div class="alert alert-danger mt-3">
                        {$error}
                    </div>
                {/if}
                <div class="col-auto d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                </div>
                <div class="text-center">
                    <p>Not a member? <a href="home">omitir</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
{include file="footer.tpl"}