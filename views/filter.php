<?php
$product = new ProductManager($db);
$families = $product->getFamily();
$colors = $product->getColor();
$conts = $product->getContenant();
$regionsFrance = $product->getRegionFrance();
$regionsStranger = $product->getRegionStranger();
$appellations = $product->getAppell();
?>

<form class="col-lg-6 col-md-12" method="POST" action="/bourvence/process/process_filter.php">
    <label class="col-12" for="family">Types de produits</label>
    <select class="col-12" name="family" id="family">
        <option value="">Tous</option>
        <?php foreach($families as $family): ?>
        <option value="<?=$family['family_id']?>"><?=$family['family_name']?></option>
        <?php endforeach ?>
    </select>

    <label class="col-12" for="color">Couleurs</label>
    <select class="col-12" name="color" id="color">
        <option value="">Toutes</option>
        <?php foreach($colors as $color): ?>
            <?php if($color['color_name'] == "Non définie"): ?>
            <?php else: ?>
            <option value="<?=$color['color_id'] ?>"><?=$color['color_name'] ?></option>
            <?php endif ?>
        <?php endforeach ?>
    </select>

    <label class="col-12" for="cont">Contenants</label>
    <select class="col-12" name="cont" id="cont">
        <option value="">Tous</option>
        <?php foreach($conts as $cont): ?>
            <?php if($cont['cont_name'] == "Non définie"): ?>
            <?php else: ?>
            <option value="<?=$cont['cont_id'] ?>"><?=$cont['cont_name'] ?></option>
            <?php endif ?>
        <?php endforeach ?>      
    </select>

    <label class="col-12" for="region">Régions</label>
    <select class="col-12" name="region" id="region">
        <option value="">Toutes</option>
        <optgroup label="France">
            <?php foreach($regionsFrance as $regionF): ?>
            <option value="<?= $regionF['region_id'] ?>"><?= $regionF['region_name'] ?></option>
        <?php endforeach ?> 
        </optgroup>
        <optgroup label="Etranger">
        <?php foreach($regionsStranger as $regionS): ?>
            <option value="<?= $regionS['region_id'] ?>"><?= $regionS['region_name'] ?></option>
        <?php endforeach ?> 
        </optgroup>
    </select>

    <label class="col-12" for="appell">Appellations</label>
    <select class="col-12" name="appell" id="appell">
        <option value="">Toutes</option>
            <?php foreach($appellations as $appellation): ?>
                <?php if($appellation['appell_name'] == "Non définie"): ?>
                <?php else: ?>
                <option value="<?= $appellation['appell_id'] ?>"><?= $appellation['appell_name'] ?></option>
                <?php endif ?>
            <?php endforeach ?> 
    </select>

    <label class="col-12" for="price_min">Prix Minimum</label>
    <input class="col-12" type="number" name="price_min" id="price_min" step="0.10">

    <label class="col-12" for="price_max">Prix Maximum</label>
    <input class="col-12" type="number" name="price_max" id="price_max" step="0.10">

    <button class="btn-filter col-sm-12" type="submit" name="submitFilter">Filtre</button>
</form>