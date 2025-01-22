<section>
    <h2>I gusti più amati dai nostri clienti</h2>
    <ul class="list-unstyled">
        <?php foreach($templateParams["gustiMigliori"] as $gustiMigliori): ?>
            <li>
                <?php echo $gustiMigliori["Nome_gusto"];?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
