<select class="form-control" id="sel1" name="etage">
    <option>tous</option>
    <?php for ($etage = 1; $etage <= $nbEtages; $etage++) : ?>
        <option value="<?= $etage ?>" <?= (isset($taskEtage) && $taskEtage == $etage ? "selected" : "") ?>><?= $etage ?></option>
    <?php endfor; ?>
</select>