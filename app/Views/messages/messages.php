 <!-- error -->
 <?php if (session('errorsMSG')): ?>
    <?php foreach (session('errorsMSG') as $errorsa): ?>
        <div class="alert alert-warning  fade show" role="alert">
            <?= $errorsa ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>
<!-- succsess -->
<?php if (session('successMSG')): ?>
    <?php foreach (session('successMSG') as $errorsa): ?>
        <div class="alert alert-info  fade show" role="alert">
            <?= $errorsa ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php break; ?>
    <?php endforeach ?>
<?php endif ?>