<div class="row">
    <div class="col-12">
        <form action="index.php?route=utilisateur&action=update" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID : </label>
                <input type="number" name="id" class="form-control" id="id">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Send</button>
            </div>
        </form>
    </div>
</div>